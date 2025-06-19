<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uslis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('toastr-error', 'Anda belum login');

			redirect('login', 'refresh');
		}

		$this->load->model('M_Uslis', 'uslis');
	}

	public function index()
	{
		$data = [
			'title'   => 'Uslis',
			'page'    => 'uslis/v_uslis',
			'uslis' => $this->uslis->getAllUslis()
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Uslis',
			'page'  => 'uslis/v_addUslis'
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nama', 'Nama STO', 'required', [
			'required' => 'Nama Anggota harus diisi!'
		]);
		$this->form_validation->set_rules('nonwarranty', 'Nonwarranty', 'required', [
			'required' => 'Nonwarranty harus diisi!'
		]);
		$this->form_validation->set_rules('warranty', 'Warranty', 'required', [
			'required' => 'Warranty harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nama'  => $this->input->post('nama'),
				'nonwarranty' => $this->input->post('nonwarranty'),
				'warranty' => $this->input->post('warranty'),
			];

			// proses untuk insert ke tabel
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

		$data = [
			'title'   => 'Edit Uslis',
			'page'    => 'uslis/v_editUslis',
			'uslis' => $uslis
		];

		$this->load->view('layout/index', $data);
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

		$id = $this->input->post('id_uslis');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nama'  => $this->input->post('nama'),
				'nonwarranty' => $this->input->post('nonwarranty'),
				'warranty' => $this->input->post('warranty')
			];

			// proses update
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
}
