<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

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

    }

    public function index()
    {
        // Title
        $data['judul'] = 'Cuti Page';

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();
        
        // Table
        $data['daftar_cuti'] = $this->Cuti_model->showCutiStaff($data['user']['nip'])->result_array();

        // Akun baru / belum isi profile
        $data['profile'] = $this->Profile_model->getProfile($data['user']['id'])->num_rows();

        if($data['profile'] > 0 ) {
            // Dashboard
            $this->load->view('template/header', $data);
            $this->load->view('cuti/index', $data);
            $this->load->view('template/footer');
        } else {
            // $this->session->set_flashdata('flash', 'Profile');
            redirect('profile/ubahProfile/'.$sessID);

        }
    }

    public function pengajuan()
    {
        // Title
        $data['judul'] = "Pengajuan Cuti";

        // Navbar
		$sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();
        
        // Value input
        $data['jenis'] = $this->Cuti_model->getJenisCuti()->result_array();

        // form validation
		$this->form_validation->set_rules('nip', 'NIP', 'required|max_length[24]');
		$this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required');
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('cuti/pengajuan', $data);
            $this->load->view('template/footer-form');

        } else 
        {
            $this->Cuti_model->tambahCuti();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('cuti/index');

        }

    }

    public function detailCuti($id)
    {
        // Title
        $data['judul'] = "Detail Cuti";

        // Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();
        
        // Table
        $data['detail'] = $this->Cuti_model->detailCuti($id)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('cuti/detailCuti', $data);
        $this->load->view('template/footer');        

    }

    public function ubahCuti($id)
    {
        // Title
        $data['judul'] = "Form Ubah Pengajuan Cuti";

        // Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();

        // Value input
        $data['cuti'] = $this->Cuti_model->getCutiById($id)->row_array();
        $data['jenis'] = $this->Cuti_model->getJenisCuti()->result_array();

        // form validation
        $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[24]');
		$this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required');
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('cuti/ubahCuti', $data);
            $this->load->view('template/footer-form');

        } else 
        {
            $this->Cuti_model->ubahCuti();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('cuti/index');

        }

    }

    public function hapusCuti($id)
    {
        $this->Cuti_model->hapusCuti($id);
		$this->session->set_flashdata('flash', 'Dihapus / Dibatalkan');
		redirect('cuti/index');

    }

    // Laporan, Cuma yg udah di approve
    public function indexLaporan()
    {
        // Title
        $data['judul'] = 'Manage Cuti';

        // Navbar
		$sessID = $this->session->userdata('id');
        $sesslvl = $this->session->userdata('level');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        $data['pending'] = $this->Cuti_model->getCutiPending()->num_rows();

        // Table Default
        $data['cuti'] = $this->Cuti_model->showCuti()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('cuti/indexLaporan', $data);
        $this->load->view('template/footer');

    }

    public function searchCutiPeriode()
    {
        // Search Box
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');

        // execute search box
        $cuti = $this->Cuti_model->searchPeriode($awal, $akhir)->result_array();

        // load view laporan Periode, kirim isi tabelnya diisi array $cuti.
        $showCuti = $this->load->view('cuti/laporanTable', array('cuti' => $cuti), TRUE);

        // Buat array Callback
        $callback = array(
            'showCuti' => $showCuti, // set array showcuti dengan hasil view setelah search
        );

        echo json_encode($callback); // dikonversi jadi json

    }


}