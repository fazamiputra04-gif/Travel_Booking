<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Cek apakah sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); // kalau belum login, kembali ke halaman login umum
        }

        // Ambil data user dari session
        $data['user'] = $this->session->userdata();

        // Tampilkan dashboard admin (pastikan file view ini ada)
        $this->load->view('panel_admin/dashboard', $data);
    }

    public function edit_password()
    {
        // Pastikan user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('tb_user', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['judul'] = 'Edit Password';

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('panel_admin/edit_password', $data);
            $this->load->view('template/footer');
        } else {
            $current_password = $this->input->post('password_lama');
            $new_password = $this->input->post('password1');

            // Pastikan password lama benar
            if ($current_password !== $data['user']['password']) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Password lama salah!
                </div>');
                redirect('panel_admin/edit_password');
            } elseif ($current_password == $new_password) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password lama!
                </div>');
                redirect('panel_admin/edit_password');
            } else {
                // Update password
                $this->db->set('password', $new_password);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('tb_user');

                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Password berhasil diubah!
                </div>');
                redirect('panel_admin/edit_password');
            }
        }
    }
}
