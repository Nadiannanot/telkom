<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Sektor extends CI_Controller
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

		$this->load->model('M_Sektor', 'sektor');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		if (!empty($keyword)) {
			$sektor_data = $this->sektor->searchSektor($keyword);
		} else {
			$sektor_data = $this->sektor->getAllSektor();
		}

		$email = $this->session->userdata('email');
		$data = [
			'title'   => 'Sektor',
			'page'    => 'sektor/v_sektor',
			'judul'   => 'Data Sektor',
			'sektor'  => $sektor_data,
			'keyword' => $keyword,
			'user'    => $this->db->get_where('user', ['email' => $email])->row_array()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sektor/v_sektor', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email');
		$data = [
			'title' => 'Tambah Sektor',
			'page'  => 'sektor/v_addSektor',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sektor/v_addsektor', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('sektor', 'Sektor', 'required', [
			'required' => 'Nama sektor harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'sektor' => $this->input->post('sektor')
			];

			$insert = $this->sektor->insertSektor($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('sektor', 'refresh');
		}
	}

	public function edit($id)
	{
		$sektor = $this->sektor->getSektorById($id);
		if (!$sektor) {
			show_404();
		}

		$email = $this->session->userdata('email');
		$data = [
			'title'  => 'Edit Data Sektor',
			'judul'  => 'Edit Data Sektor',
			'page'   => 'sektor/v_editSektor',
			'sektor' => $sektor,
			'user'   => $this->db->get_where('user', ['email' => $email])->row_array()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sektor/v_editsektor', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('sektor', 'Sektor', 'required', [
			'required' => 'Nama sektor harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'sektor' => $this->input->post('sektor')
			];

			$update = $this->sektor->updateSektor($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('sektor');
		}
	}

	public function delete($id)
	{
		$delete = $this->sektor->deleteSektor($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('sektor');
	}

	public function uploadCsv()
	{
		if ($_FILES['csv_file']['name']) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");

			$header = fgetcsv($handle, 1000, ","); // skip header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					'sektor'    => $row[0],

				];
				$this->db->insert('sektor', $data);
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}

		redirect('sektor');
	}
}
