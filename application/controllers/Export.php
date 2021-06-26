<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Model
		$this->load->model('Data_model');
        $this->load->model('Cuti_model');
        $this->load->model('User_model');
        $this->load->model('Profile_model');

    }

    public function mpdf($id)
    {
        // Title
        $data['judul'] = "Detail Cuti";

        // Navbar
        $sessID = $this->session->userdata('id');
        $data['user'] = $this->User_model->User($sessID)->row_array();
        
        // Table
        $data['cuti'] = $this->Cuti_model->detailCuti($id)->row_array();

        // Nama Petugas yg acc permohonan cuti
        $data['userid'] = $this->User_model->getUserByUsername($data['cuti']['edited_by'])->row_array();
        $data['petugas'] = $this->Profile_model->getProfile($data['userid']['id'])->row_array();

        $data = $this->load->view('pdf/mpdf', $data, TRUE);

        // Load mPDF
        $mpdf = new \Mpdf\Mpdf();

        $mpdf->WriteHTML($data);

        $file = 'Cuti_';
        $pemohon = 'User[' . "0" . $sessID . "]";
        $printDate = date('dmY');

        $filename = $file . $pemohon . $printDate . '.pdf';
        $mpdf->Output($filename, 'D');

    }


}
