<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

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
		$data['title'] = 'Menu Management';
		$data['menu'] = $this->menu->getAllMenu();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_menu', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Tambah Menu';
		if ($this->input->post()) {
			$menu = $this->input->post('menu');
			$this->menu->addMenu(['menu' => $menu]);
			redirect('menu');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_addmenu', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Edit Menu';
		$data['menu'] = $this->menu->getMenuById($id);
		if ($this->input->post()) {
			$menu = $this->input->post('menu');
			$this->menu->updateMenu($id, ['menu' => $menu]);
			redirect('menu');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_editmenu', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->menu->deleteMenu($id);
		redirect('menu');
	}

	public function submenu()
	{
		// Redirect ke controller Submenu (paling umum)
		redirect('submenu');

		// Jika ingin langsung load view submenu dari sini, gunakan kode berikut:

		/*$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Submenu Management';
		$this->load->model('M_submenu', 'submenu');
		$data['submenu'] = $this->submenu->getAllSubmenu();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/v_submenu', $data);
		$this->load->view('templates/footer');
		*/
	}
}
