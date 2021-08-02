<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

        // Model
		$this->load->model('Data_model');
        $this->load->model('User_model');
        $this->load->model('Profile_model');
        $this->load->model('Cuti_model');
        
        // Library
		$this->load->library('form_validation');

	}

    public function detailUser($id)
	{
		// Title
		$data['judul'] = 'Profile User';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
		$data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();

		// Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

		// ISI TABEL DETAIL
		$data['profile'] = $this->Profile_model->showProfile($id)->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('profile/profile', $data);
		$this->load->view('template/footer');

	}

	public function getJabatan() // dynamic select box
	{
		$id_divisi = $this->input->post('id');
		$data = $this->Data_model->getAllJabatan($id_divisi);

		$output = "";
		foreach($data as $row)
		{
			$output .= "<option value='".$row->id."'>".$row->jabatan."</option>";

		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));

	}

	public function ubahProfile($id) // ambil pas nge klik button edit
	{
		// Title
		$data['judul'] = 'Ubah Profile';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
		$data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();

		// Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

		// untuk select box
		$data['divisi'] = $this->Data_model->getAllDivisi()->result_array();

		$this->form_validation->set_rules('id', 'ID', 'numeric');
		$this->form_validation->set_rules('nip', 'NIP', 'required|max_length[24]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|max_length[30]');
		$this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('telp', 'Nomer Telepon', 'required|numeric');

		if($data['profileKeisi'] > 0) {
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('template/header', $data);
				$this->load->view('profile/ubahProfile', $data); // reload ulang
				$this->load->view('template/footer-form');

			} else 
			{
				$this->Profile_model->ubahProfile();
				$this->session->set_flashdata('flash', 'Diubah');	
				redirect('profile/detailUser/'.$sessID);
			}
		} else {
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('template/header', $data);
				$this->load->view('profile/tambahProfile', $data); // reload ulang
				$this->load->view('template/footer-form');

			} else 
			{
				$this->Profile_model->tambahProfile();
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('profile/detailUser/'.$sessID);
			}

		}
		
	}

	public function ubahUser($id)
	{
		// Title
		$data['judul'] = 'Profile User';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
		$data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();

		// Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password1', 'Password Lama', 'required|min_length[6]|trim|matches[password2]',
		['min_length[6]' => 'Password minimal 6 Karakter',
		'matches' => 'Password harus sama']
		);
		$this->form_validation->set_rules('password2', 'Password Lama', 'required|min_length[6]|trim|matches[password2]',
		['min_length[6]' => 'Password minimal 6 Karakter',
		'matches' => 'Password harus sama']
		);
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/header', $data);
			$this->load->view('profile/ubahUser', $data); // reload ulang
			$this->load->view('template/footer-form');

		} else 
		{
			$this->User_model->ubahPassword();
			$this->session->set_flashdata('flash', 'Diubah');

			redirect('profile/ubahUser/'.$id);

		}		
	}
}