<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model','auth');
        $this->load->helper(array('url','form'));
        $this->load->library(array('session','form_validation'));
    }

    public function index()
    {
        // Redirect kalau sudah login
        if ($this->session->userdata('user_id')) {
            redirect('Panel_admin'); // sesuaikan route/dashboard aplikasi
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('nama','Nama atau Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login');
            return;
        }

        $username = $this->input->post('nama', true);
        $password = $this->input->post('password', true);

        $user = $this->auth->get_by_username_or_email($username);
        if (!$user) {
            $this->session->set_flashdata('error','User tidak ditemukan');
            redirect('auth');
        }

        $stored = isset($user['password']) ? $user['password'] : '';
        $verified = false;

        // jika bcrypt (mulai dengan $2y$ atau $2a$)
        if (substr($stored,0,4) === '$2y$' || substr($stored,0,4) === '$2a$') {
            if (password_verify($password, $stored)) $verified = true;
        } else {
            // fallback ke MD5 (legacy)
            if (md5($password) === $stored) $verified = true;
        }

        if ($verified) {
            $sess = array(
                'user_id'   => $user['id_user'],
                'username'  => $user['nama'], // disesuaikan dengan nama kolom di DB
                'email'     => isset($user['email']) ? $user['email'] : '',
                'role'      => isset($user['role']) ? $user['role'] : 'user',
                'logged_in' => true
            );
            $this->session->set_userdata($sess);
            redirect('Panel_admin'); // arahkan ke halaman utama / dashboard kamu
        } else {
            $this->session->set_flashdata('error','Password salah');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
