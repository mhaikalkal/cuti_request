<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
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

        // Akses Manajemen
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        } else {
            if($level === '1') 
            {
                redirect('admin');
    
            } else if($level === '2')
            {
                redirect('manager');
                
            }

        }
    }

	public function index()
	{
		// Title
        $data['judul'] = 'Staff Page';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        
        // Akun baru / belum isi profile
        $data['profileKeisi'] = $this->db->get_where('user_profile', ['id' => $sessID])->num_rows();

        if($data['profileKeisi'] > 0 ) {
            // Head
            $data['judul'] = 'Staff Page';

            // Dashboard
            $data['allcuti'] = $this->Cuti_model->getCutiByNIP($data['user']['nip'])->num_rows();
            $data['pending'] = $this->Cuti_model->getCutiPendingByNIP($data['user']['nip'])->num_rows();
            $data['acc'] = $this->Cuti_model->getCutiApprovedByNIP($data['user']['nip'])->num_rows();
            $data['dec'] = $this->Cuti_model->getCutiDeclinedByNIP($data['user']['nip'])->num_rows();

            $this->load->view('template/header', $data);
            $this->load->view('staff/index', $data);
            $this->load->view('template/footer');

        } else 
        {
            // $this->session->set_flashdata('warning', 'Profile');
            redirect('profile/ubahProfile/'.$sessID);

        }
        
	}
    
}
