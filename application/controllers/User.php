<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $email = $this->session->userdata('email');
        if (!$email) {
            // Jika tidak login, redirect ke halaman login
            redirect('auth');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'My Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
}