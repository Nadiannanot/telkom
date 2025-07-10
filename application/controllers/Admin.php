<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		if ($this->session->userdata('role_id') != 1) {
			redirect('auth');
		}
	}

	// Dashboard
	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	// Profile
	public function profile()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = 'Profile Admin';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer');
	}

	// Role Management - List
	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['form_mode'] = 'list';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	// Add Role
	public function addRole()
	{
		$data['title'] = 'Tambah Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['form_mode'] = 'add';

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => htmlspecialchars($this->input->post('role', true))]);
			redirect('admin/role');
		}
	}

	// Edit Role
	public function editRole($id)
	{
		$data['title'] = 'Edit Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
		$data['form_mode'] = 'edit';

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->update('user_role', ['role' => htmlspecialchars($this->input->post('role', true))], ['id' => $id]);
			redirect('admin/role');
		}
	}

	// Delete Role
	public function deleteRole($id)
	{
		$this->db->delete('user_role', ['id' => $id]);
		redirect('admin/role');
	}

	// Role Access Page
	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1); // Exclude Super Admin (id = 1)
		$data['menu'] = $this->db->get('user_menu')->result_array();

		// Optional: jika kamu ingin pakai closure di view
		$data['check_access'] = function ($role_id, $menu_id) {
			return $this->check_access($role_id, $menu_id);
		};

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role_access', $data);
		$this->load->view('templates/footer');
	}

	// Fungsi untuk return true/false jika ada akses
	private function role_access($role_id, $menu_id)
	{
		$query = $this->db->get_where('user_access_menu', [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		]);

		return $query->num_rows() > 0;
	}

	// Fungsi untuk return "checked='checked'" ke view
	public function check_access($role_id, $menu_id)
	{
		$this->db->where('role_id', $role_id);
		$this->db->where('menu_id', $menu_id);
		$result = $this->db->get('user_access_menu');

		if ($result->num_rows() > 0) {
			return "checked='checked'";
		}
		return '';
	}

	// Aksi saat checkbox diubah
	public function changeAccess()
	{
		$role_id = $this->input->post('roleId');
		$menu_id = $this->input->post('menuId');
		$is_checked = $this->input->post('isChecked');

		if ($is_checked == 'true' || $is_checked == 1) {
			// Tambah akses
			$data = [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			];
			$this->db->insert('user_access_menu', $data);
		} else {
			// Hapus akses
			$this->db->delete('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);
		}

		$this->session->set_flashdata('toastr-success', 'Akses berhasil diubah.');

		echo json_encode(['status' => true]);
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('toastr-success', 'Anda telah berhasil logout.');
		redirect('auth');
	}
}
