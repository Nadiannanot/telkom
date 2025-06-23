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

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Sektor',
			'page' => 'sektor/v_sektor',
			'judul' => 'Data Sektor',
			'sektor' => $sektor_data,
			'keyword' => $keyword,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sektor/v_sektor', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Sektor',
			'page' => 'sektor/v_addSektor',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
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
			$email = $this->session->userdata('email'); // tambahkan baris ini
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

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Edit Data Sektor',
			'judul' => 'Edit Data Sektor',
			'page' => 'sektor/v_editSektor',
			'sektor' => $sektor,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sektor/v_addsektor', $data);
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

	public function upload_excel()
	{
		if (!empty($_FILES['file_excel']['name'])) {
			$file = $_FILES['file_excel']['tmp_name'];

			$spreadsheet = IOFactory::load($file);
			$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

			$data = [];
			for ($i = 2; $i <= count($sheet); $i++) {
				$data[] = [
					'sektor' => trim($sheet[$i]['A'])
				];
			}

			$this->db->insert_batch('sektor', $data);
			$this->session->set_flashdata('message', 'Data berhasil diupload!');
		} else {
			$this->session->set_flashdata('error', 'File belum dipilih!');
		}

		redirect('sektor');
	}
}
