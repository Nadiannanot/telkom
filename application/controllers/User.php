<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        if ($this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'My Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
}
