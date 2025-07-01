<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Uslis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		if ($this->session->userdata('role_id') != 1) {
			redirect('user');
		}

		$this->load->model('M_Uslis', 'uslis');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		if (!empty($keyword)) {
			$uslis_data = $this->uslis->searchUslis($keyword);
		} else {
			$uslis_data = $this->uslis->getAllUslis();
		}

		$email = $this->session->userdata('email');
		$data = [
			'title'   => 'Uslis',
			'page'    => 'uslis/v_uslis',
			'judul'   => 'Data Uslis',
			'uslis'   => $uslis_data,
			'keyword' => $keyword,
			'user'    => $this->db->get_where('user', ['email' => $email])->row_array()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('uslis/v_uslis', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email');
		$data = [
			'title' => 'Tambah Uslis',
			'page'  => 'uslis/v_adduslis',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('uslis/v_adduslis', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nama', 'Nama Anggota', 'required', [
			'required' => 'Nama pelanggan harus diisi!'
		]);
		$this->form_validation->set_rules('nonwarranty', 'Peran', 'required', [
			'required' => 'Nomor handphone harus diisi!'
		]);
		$this->form_validation->set_rules('warranty', 'Email', 'required', [
			'required' => 'Nomor handphone harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nama'        => $this->input->post('nama'),
				'nonwarranty' => $this->input->post('nonwarranty'),
				'warranty'    => $this->input->post('warranty')
			];

			$insert = $this->uslis->insertUslis($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('uslis', 'refresh');
		}
	}

	public function edit($id)
	{
		$uslis = $this->uslis->getUslisById($id);
		if (!$uslis) {
			show_404();
		}

		$email = $this->session->userdata('email');
		$data = [
			'title' => 'Edit Data Uslis',
			'judul' => 'Edit Data Uslis',
			'page'  => 'uslis/v_edituslis',
			'uslis' => $uslis,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('uslis/v_edituslis', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama Anggota', 'required', [
			'required' => 'Nama pelanggan harus diisi!'
		]);
		$this->form_validation->set_rules('nonwarranty', 'Peran', 'required', [
			'required' => 'Nomor handphone harus diisi!'
		]);
		$this->form_validation->set_rules('warranty', 'Email', 'required', [
			'required' => 'Nomor handphone harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nama'        => $this->input->post('nama'),
				'nonwarranty' => $this->input->post('nonwarranty'),
				'warranty'    => $this->input->post('warranty')
			];

			$update = $this->uslis->updateUslis($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('uslis');
		}
	}

	public function delete($id)
	{
		$delete = $this->uslis->deleteUslis($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('uslis');
	}

	public function uploadCsv()
	{
		if (!empty($_FILES['csv_file']['name'])) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");

			$header = fgetcsv($handle, 1000, ","); // Lewati header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					'nama'    => trim($row[0]),
					'nonwarranty'  => trim($row[1]),
					'warranty'   => trim($row[2]),
				];
				$this->db->insert('uslis', $data);
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}

		redirect('uslis');
	}
}
