<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Cek apakah user sudah login
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}

		// Cek apakah user adalah admin
		if ($this->session->userdata('role_id') != 1) {
			redirect('user');
		}
	}
	public function index()
	{
		// Ambil data user dari session
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get('user', ['email' => $this->session->set_userdata('email')])->row_array();
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
}
