<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
        $data['judul'] = 'Login Page';

        if( $this->session->userdata('logged_in') ) {
            if ( $this->session->userdata('level') === '1' ) {
                redirect('admin');
            }
            else if ( $this->session->userdata('level') === '2' ) {
                redirect('manager');
            }
            else if ( $this->session->userdata('level') === '3' ) {
                redirect('staff');
            }
        } else {
		    $this->load->view('auth/login', $data); // view folder auth file login.php auth/login
        }
	}

    public function auth_process()
    {
        // Panggil modelnya
        $this->load->model('Auth_model');

        // Passing data POST dari input name;
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Verifikasi akun
        $user_validation = $this->Auth_model->user_validation($username, $password)->num_rows();

        // Ambil akun level
        $data = $this->Auth_model->user_validation($username, $password)->row(); // return objectm jadi pake ->
        

        if($user_validation > 0) { // Jika user ada
            if( $data->level === '1' ) { // 1. Administrator
                $sesi = [
                    'id' => $data->id,
                    'username' => $data->username,
                    'password' => $data->password,
                    'level' => $data->level,
                    'logged_in' => TRUE,
                ];

                $this->session->set_userdata($sesi);
                redirect('admin'); // di config/routes setting nya
            } else if( $data->level === '2' ) {
                $sesi = [
                    'id' => $data->id,
                    'username' => $data->username,
                    'password' => $data->password,
                    'level' => $data->level,
                    'logged_in' => TRUE,
                ];

                $this->session->set_userdata($sesi);
                redirect('manager');
            } else if( $data->level === '3' ) {
                $sesi = [
                    'id' => $data->id,
                    'username' => $data->username,
                    'password' => $data->password,
                    'level' => $data->level,
                    'logged_in' => TRUE,
                ];
                
                $this->session->set_userdata($sesi);
                redirect('staff');
            }
        } else {
            $this->session->set_flashdata('login_error', '<div class="alert alert-danger" role="alert">Username atau Password salah.</div>');
            redirect('auth');
        }

    }

    public function logout()
    {
        unset(
            $_SESSION['id'],
            $_SESSION['username'],
            $_SESSION['password'],
            $_SESSION['level'],
            $_SESSION['logged_in']
        );

        $this->session->sess_destroy();
        redirect('auth');
    }

}
