<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        // Model
		$this->load->model('Data_model');
        $this->load->model('Cuti_model');
        $this->load->model('User_model');
        $this->load->model('Profile_model');
        
        // Library
		$this->load->library('form_validation'); 

        // Session
        $level = $this->session->userdata('level');

        // Akses Manajemen
        if(!$this->session->userdata('logged_in')) : 
            redirect('auth');
        else :
            if($level === '2') :
                redirect('manager');
            elseif($level === '3') : 
                redirect('staff');
            endif;
        endif;

    }

	public function index()
	{
        // Title
        $data['judul'] = 'Admin Page';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        
        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();
        
        // Kalo udah isi profile
        if( $data['profileKeisi'] > 0 ) {
            // Dashboard
            $data['jml_akun'] = $this->User_model->jumlahAkun();
            $data['jml_admin'] = $this->User_model->jumlahAdmin();
            $data['jml_manager'] = $this->User_model->jumlahManager();
            $data['jml_staff'] = $this->User_model->jumlahStaff();
            $data['jml_cuti'] = $this->Cuti_model->getAllCuti()->num_rows();

            $this->load->view('template/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('template/footer');
        } else {
            // $this->session->set_flashdata('warning', 'Profile');
            redirect('profile/ubahProfile/'.$sessID, $data);

        }
	}
    
    # MANAGE CUTI START #
	public function manageCuti()
    {
        // Title
        $data['judul'] = "Pengajuan Cuti";

        // Navbar
		$sessID = $this->session->userdata('id');
        $sesslvl = $this->session->userdata('level');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

        if($sesslvl === '3') :
            redirect('staff/index');
        endif;
    
        // Table
        $data['daftar_cuti'] = $this->Cuti_model->showCuti()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('cuti/manageCuti', $data);
        $this->load->view('template/footer');

    }

	public function detailCuti($id)
    {
        // Title
        $data['judul'] = "Detail Cuti";

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();
        
        // Table
        $data['detail'] = $this->Cuti_model->detailCuti($id)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/detailCuti', $data);
        $this->load->view('template/footer');        

    }

    public function ubahCuti($id)
    {
        // Title
        $data['judul'] = "Form Ubah Pengajuan Cuti";

        // Navbar
		$sessID = $this->session->userdata('id');
		$data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

        // Value input
        $data['cuti'] = $this->Cuti_model->getCutiById($id)->row_array();
        $data['jenis_cuti'] = $this->Cuti_model->getJenisCuti()->result_array();

        // form validation
        $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[24]');
		$this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required');
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('admin/ubahCuti', $data);
            $this->load->view('template/footer-form');

        } else 
        {
            $this->Cuti_model->ubahCuti();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/manageCuti');

        }

    }

    public function hapusCuti($id)
    {
        $this->Cuti_model->hapusCuti($id);
		$this->session->set_flashdata('flash', 'Dihapus / Dibatalkan');
		redirect('admin/manageCuti');

    }
    # END CUTI #

    # MANAGE USER START #
    public function manageUser()
    {
        // Title
        $data['judul'] = "Manage User Data";

        // Navbar
        $sessID = $this->session->userdata('id');
		$data['user'] = $this->User_model->User($sessID)->row_array();
        
        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();
            
        // Tabel
        $data['users'] = $this->User_model->showUsers()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');

    }

    public function tambahUser()
	{
		// Title
		$data['judul'] = 'Tambah User';

		// Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

        // Value Input
        $data['level'] = $this->Data_model->getAllLevel()->result_array();

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|trim',
		['min_length[6]' => 'Password minimal 6 Karakter']);

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/header', $data);
			$this->load->view('user/tambahUser', $data); // reload ulang
			$this->load->view('template/footer-form');

		} else 
		{
			$this->User_model->tambahUser();
			$this->session->set_flashdata('flash', 'Ditambahkan');

			redirect('admin/manageUser');

		}		
	}

    public function ubahUser($id)
    {
        // untuk navbar
		$data['judul'] = 'Ubah User Setting';

		// Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

        // Value input box
        $data['auser'] = $this->User_model->pickUser($id)->result_array();
        $data['level'] = $this->Data_model->getAllLevel()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('user/ubahUser', $data); // reload ulang
        $this->load->view('template/footer-form');

        // Kalau update Data
        // kalo button submit ubah password, maka yg di eksekusi ya form_validation password
        if(isset($_POST['password_btn']))
        {
            $this->form_validation->set_rules('username', 'Username', 'trim');
            $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim');
            $this->form_validation->set_rules('re_password', 'Ulangi Password Baru', 'required|trim|matches[new_password]');

            // Kalo ubah Password
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header', $data);
                $this->load->view('user/ubahUser', $data); // reload ulang
                $this->load->view('template/footer-form');

            } else
            {
                $this->User_model->ubahUserPassword();
                $this->session->set_flashdata('flash', 'Diubah');

                redirect('admin/ubahUser/'.$id);

            }

        } else if(isset($_POST['level_btn'])) // ubah level
        {
            $this->form_validation->set_rules('level', "Level", "trim");

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header', $data);
                $this->load->view('user/ubahUser', $data); // reload ulang
                $this->load->view('template/footer-form');

            } else
            {
                $this->User_model->ubahUserLevel();
                $this->session->set_flashdata('flash', 'Diubah');

                redirect('admin/ubahUser/'.$id);

            }

        }
        

    }
    # END MANAGE USER #

    # MANAGE PROFILE START #
    public function detailProfile($id)
    {
        // Title
        $data['judul'] = 'Profile User';

        // Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();
        
        // Table
        $data['anyprofile'] = $this->Profile_model->getProfile($id)->num_rows();
        $data['profile'] = $this->Profile_model->showProfile($id)->result_array();

        // Button Ubah Jika Profile Kosong
        $data['self'] = $id;

        $this->load->view('template/header', $data);
        $this->load->view('user/detailProfile', $data);
        $this->load->view('template/footer');

    }

    public function ubahProfile($id)
    {
        // Title
		$data['judul'] = "Edit Profile";

        // Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        $data['self'] = $id;

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();
        $data['pickeduser'] = $this->User_model->getUser($id)->row_array();

        // Table
        $data['anyprofile'] = $this->Profile_model->getProfile($id)->num_rows(); // Akun yg dipilih
        $data['profile'] = $this->Profile_model->showProfile($id)->row_array();
		$data['divisi'] = $this->Data_model->getAllDIvisi()->result_array();
        
		$this->form_validation->set_rules('id', 'ID', 'numeric');
		$this->form_validation->set_rules('nip', 'NIP', 'required|max_length[24]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|max_length[30]');
		$this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('telp', 'Nomer Telepon', 'required|numeric');

        if($data['anyprofile'] > 0 ) {
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header', $data);
                $this->load->view('user/ubahProfile', $data); // reload ulang
                $this->load->view('template/footer-form');

            } else {
                $this->Profile_model->ubahProfile();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('admin/detailProfile/'.$id);

            }
        } else {
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header', $data);
                $this->load->view('user/tambahProfile', $data); // reload ulang
                $this->load->view('template/footer-form');

            } else {
                $this->Profile_model->tambahProfile();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('admin/detailProfile/'.$id);

            }
        }

    }    

    public function hapusUser($id)
    {
        $this->User_model->hapusUser($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/manageUser');

    }

    public function backupDB()
    {
        // load db utility
        $this->load->dbutil();

        // nama file db backup
        $db_name = 'backup-db-'. $this->db->database . '-on-' . date("Y-m-d-H-i-s") . '.sql';

        $prefs = array(
            'format' => 'zip',
            'filename' => $db_name,
            'add_insert' => TRUE,
            'foreign_key_checks' => FALSE,
        );

        // var backup
        $backup = $this->dbutil->backup($prefs);

        $save = 'pathtobkfolder/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);

    }

    public function settingWeb()
    {
        // untuk navbar
		$data['judul'] = 'Ubah User Setting';

		// Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();

        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

        $this->load->view('template/header', $data);
        $this->load->view('settings/webSetting', $data);
        $this->load->view('template/footer-form');
        
    }

    public function uploadSplashLogin()
    {
        $config['upload_path'] = '././vendor/Login/images/';
        $config['allowed_types'] = "png|jpg";
        $config['file_name'] = 'splashscreen.jpg'; // karena ga pake database, di provide default_name aja biar gampang
        $config['overwrite'] = TRUE;
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        
        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('splash') )
        {   
            $error = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">'
                . $this->upload->display_errors() .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            $this->session->set_flashdata('image', $error);

            redirect('admin/settingWeb', $data);


        } else 
        {
            $data = ['splash_metadata' => $this->upload->data()];
            $this->session->set_flashdata('flash', 'Diubah');
            
            redirect('admin/settingWeb', $data);
        }

    }

}
