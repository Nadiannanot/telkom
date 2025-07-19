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

		$this->load->library('form_validation');
	}

	// Dashboard
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->getUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	// Get user session
	private function getUser()
	{
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	// ======================= PROFILE ========================

	public function editProfile()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->getUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit_profile', $data);
		$this->load->view('templates/footer');
	}

	public function update_profile()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		// Upload foto jika ada
		if (!empty($_FILES['foto']['name'])) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			$config['upload_path']  = './assets/img/profile/';
			$config['file_name']    = uniqid();

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$old_image = $this->db->get_where('user', ['email' => $email])->row()->foto;
				if ($old_image != 'default.jpg' && file_exists(FCPATH . 'assets/img/profile/' . $old_image)) {
					unlink(FCPATH . 'assets/img/profile/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('foto', $new_image);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
				redirect('admin/editProfile');
				return;
			}
		}

		$this->db->set('name', $name);
		$this->db->where('email', $email);
		$this->db->update('user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diperbarui!</div>');
		redirect('admin/editProfile');
	}

	// ======================= ROLE ========================

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->getUser();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['form_mode'] = 'list';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function addRole()
	{
		$data['title'] = 'Tambah Role';
		$data['user'] = $this->getUser();
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

	public function editRole($id)
	{
		$data['title'] = 'Edit Role';
		$data['user'] = $this->getUser();
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

	public function deleteRole($id)
	{
		$this->db->delete('user_role', ['id' => $id]);
		redirect('admin/role');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->getUser();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1); // hide superadmin
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$data['check_access'] = function ($role_id, $menu_id) {
			return $this->check_access($role_id, $menu_id);
		};

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role_access', $data);
		$this->load->view('templates/footer');
	}

	public function check_access($role_id, $menu_id)
	{
		$this->db->where('role_id', $role_id);
		$this->db->where('menu_id', $menu_id);
		$result = $this->db->get('user_access_menu');
		return ($result->num_rows() > 0) ? 'checked' : '';
	}

	public function changeAccess()
	{
		$role_id = $this->input->post('roleId');
		$menu_id = $this->input->post('menuId');
		$is_checked = $this->input->post('isChecked');

		if ($is_checked == 'true' || $is_checked == 1) {
			$this->db->insert('user_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);
		} else {
			$this->db->delete('user_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);
		}

		$this->session->set_flashdata('toastr-success', 'Akses berhasil diubah.');
		echo json_encode(['status' => true]);
	}

	// ======================= LOGOUT ========================
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('toastr-success', 'Anda telah berhasil logout.');
		redirect('auth');
	}
}
