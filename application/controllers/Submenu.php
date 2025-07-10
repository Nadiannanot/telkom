<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_submenu', 'submenu');

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		if ($this->session->userdata('role_id') != 1) {
			redirect('admin');
		}

		$this->load->model('M_Menu', 'menu');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Submenu Management';
		$data['submenu'] = $this->submenu->getAllSubmenu();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_submenu', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Tambah Submenu';
		$data['menu'] = $this->submenu->getAllMenu();

		if ($this->input->post()) {
			$insert = [
				'menu_id' => $this->input->post('menu_id'),
				'title' => $this->input->post('title'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active') ? 1 : 0
			];
			$this->submenu->addSubmenu($insert);
			redirect('submenu');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_addsubmenu', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Edit Submenu';
		$data['menu'] = $this->submenu->getAllMenu();
		$data['submenu'] = $this->submenu->getSubmenuById($id);

		if ($this->input->post()) {
			$update = [
				'menu_id' => $this->input->post('menu_id'),
				'title' => $this->input->post('title'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active') ? 1 : 0
			];
			$this->submenu->updateSubmenu($id, $update);
			redirect('submenu');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_editsubmenu', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->submenu->deleteSubmenu($id);
		redirect('submenu');
	}
}
