<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HumanRes extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // Model		
        $this->load->model('Cuti_model');
        $this->load->model('User_model');
        $this->load->model('Profile_model');
        
        // Library
		$this->load->library('form_validation'); 

        // Session
        $level = $this->session->userdata('level');

        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        } else {
            if($level === '1') 
            {
                redirect('admin');
    
            } else if($level === '3')
            {
                redirect('staff');
                
            }

        }
    }

	public function index()
	{
		// Title
        $data['judul'] = 'Human Resource Department Page';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();
        
        // Dashboard
        $data['allcuti'] = $this->Cuti_model->getAllCuti()->num_rows();
        
        // Akun baru / belum isi profile
        $data['profile'] = $this->Profile_model->getProfile($data['user']['id'])->num_rows();
        
        if($data['profile'] > 0 ) {
            // Dashboard
            $this->load->view('template/header', $data);
            $this->load->view('hr/index', $data);
            $this->load->view('template/footer');
        } else {
            // $this->session->set_flashdata('warning', 'Profile');
            redirect('profile/ubahProfile/'.$sessID);

        }
	}

    public function manageCuti()
    {
        // Title
        $data['judul'] = 'Manage Cuti';

        // Navbar
		$sessID = $this->session->userdata('id');
        $sesslvl = $this->session->userdata('level');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();
        
        if($sesslvl === '3') :
            redirect('staff/index');
        endif;

        // Table
        if($data['pending'] > 0) {
            $data['daftar_cuti'] = $this->Cuti_model->showCutiHRD()->result_array();        
        } else {
            $data['daftar_cuti'] = $this->Cuti_model->showCuti()->result_array();
        }

        $this->load->view('template/header', $data);
        $this->load->view('cuti/manageCuti', $data);
        $this->load->view('template/footer');

    }

	public function detailCuti($id)
    {
        // Title
        $data['judul'] = 'Detail Cuti';

        // Navbar
		$sessID = $this->session->userdata('id');
        $sesslvl = $this->session->userdata('level');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();
        
        // Table
        $data['detail'] = $this->Cuti_model->detailCuti($id)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('hr/detailCuti', $data);
        $this->load->view('template/footer');        

    }

    public function ubahCuti($id)
    {
        // Title
        $data['judul'] = 'Form Ubah Pengajuan Cuti';

        // Navbar
		$sessID = $this->session->userdata('id');
        $sesslvl = $this->session->userdata('level');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();

        // Table
        $data['cuti'] = $this->Cuti_model->detailCuti($id)->row_array();

        // form validation
        $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[24]');
		$this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required');
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('hr/ubahCuti', $data);
            $this->load->view('template/footer-form');

        } else 
        {
            $this->Cuti_model->ubahCuti();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('humanRes/manageCuti');

        }

    }

    public function hapusCuti($id)
    {
        $this->Cuti_model->hapusCuti($id);
		$this->session->set_flashdata('flash', 'Dihapus / Dibatalkan');
		redirect('humanRes/manageCuti');

    }

    
}
