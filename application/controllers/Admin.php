<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		// Ambil data user dari session
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get('user', ['email' => $this->session->set_userdata('email')])->row_array();
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
}
