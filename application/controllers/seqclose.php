<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Seqclose extends CI_Controller
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
		$this->load->model('M_Seqclose', 'seqclose');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		if (!empty($keyword)) {
			$seqclose_data = $this->seqclose->searchSeqclose($keyword);
		} else {
			$seqclose_data = $this->seqclose->getAllSeqclose();
		}
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Seqclose',
			'page' => 'seqclose/v_seqclose',
			'judul' => 'Data Seqclose',
			'seqclose' => $seqclose_data,
			'keyword' => $keyword,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('seqclose/v_seqclose', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Tambah Seqclose',
			'page' => 'seqclose/v_addSeqclose',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini

		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('seqclose/v_addSeqclose', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required', [
			'required' => 'Segmentasi harus diisi!'
		]);
		$this->form_validation->set_rules('sub_segment', 'Sub Segment', 'required', [
			'required' => 'Sub Segment harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'segmentasi' => $this->input->post('segmentasi'),
				'sub_segment' => $this->input->post('sub_segment')
			];

			$insert = $this->seqclose->insertSeqclose($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('seqclose', 'refresh');
		}
	}

	public function edit($id)
	{
		$seqclose = $this->seqclose->getSeqcloseById($id);
		if (!$seqclose) {
			show_404();
		}

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Edit Data Seqclose',
			'judul' => 'Edit Data Seqclose',
			'page' => 'seqclose/v_editSeqclose',
			'seqclose' => $seqclose,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('seqclose/v_editSeqclose', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required', [
			'required' => 'Segmentasi harus diisi!'
		]);
		$this->form_validation->set_rules('sub_segment', 'Sub Segment', 'required', [
			'required' => 'Sub Segment harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'segmentasi' => $this->input->post('segmentasi'),
				'sub_segment' => $this->input->post('sub_segment')
			];

			$update = $this->seqclose->updateSeqclose($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('seqclose');
		}
	}

	public function delete($id)
	{
		$delete = $this->seqclose->deleteSeqclose($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('seqclose');
	}

	public function uploadCsv()
	{
		if ($_FILES['csv_file']['name']) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");

			$header = fgetcsv($handle, 1000, ","); // skip header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					'segmentasi'   			 => $row[0],
					'sub_segment'				 => $row[1],

				];
				$this->db->insert('seqclose', $data);
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}

		redirect('seqclose');
	}
}
