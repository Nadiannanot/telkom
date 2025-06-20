<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|callback_valid_nik', [
			'required' => 'NIK wajib diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Email wajib diisi!',
			'valid_email' => 'Format email tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password wajib diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);

		$user = $this->db->get_where('user', ['email' => $email])->row_array();


		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
<<<<<<< HEAD
					
					$this->load->library('session');
=======
					// HAPUS sess_destroy dan load library session di sini
>>>>>>> 63ec1f37d301d47fd2bbcd4cc4abdc0aff8835d2
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'name' => $user['name'],
						'image' => $user['foto']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum diaktifkan!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|callback_valid_nik|is_unique[user.nik]', [
			'required' => 'NIK wajib diisi!',
			'is_unique' => 'NIK sudah terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Register';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'foto' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'createdAt' => date('Y-m-d H:i:s'),
				'updatedAt' => date('Y-m-d H:i:s')
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat! Silakan login.</div>');
			redirect('auth');
		}
	}

	public function valid_nik($nik)
	{
		if (!preg_match('/^[0-9]{16}$/', $nik)) {
			$this->form_validation->set_message('valid_nik', 'NIK harus terdiri dari 16 digit angka.');
			return false;
		}
		return true;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}
}
