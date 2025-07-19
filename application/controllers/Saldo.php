<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Saldo extends CI_Controller
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

		$this->load->model('M_Saldo', 'saldo');
		$this->load->model('M_Cp', 'cp'); // Tambahan relasi nd_inet
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		if (!empty($keyword)) {
			$saldo_data = $this->saldo->searchSaldo($keyword);
		} else {
			$saldo_data = $this->saldo->getAllSaldo();
		}

		$data_cp = $this->cp->getAllCp();

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Saldo',
			'page' => 'saldo/v_saldo',
			'judul' => 'Data Saldo',
			'saldo' => $saldo_data,
			'cp' => $data_cp,
			'keyword' => $keyword,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('saldo/v_saldo', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Tambah Saldo',
			'page' => 'saldo/v_addSaldo',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array(),
			'nd_inet' => $this->saldo->get_list_nd_inet(),
			'nama_teknisi' => $this->saldo->getnamateknisi()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('saldo/v_addsaldo', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nd_inet', 'ND Inet', 'required', [
			'required' => 'ND Inet harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', [
			'required' => 'Jenis Saldo harus diisi!'
		]);
		$this->form_validation->set_rules('type_pelanggan', 'Type Pelanggan', 'required', [
			'required' => 'Type Pelanggan harus diisi!'
		]);
		$this->form_validation->set_rules('tgl_input', 'Tanggal Input', 'required', [
			'required' => 'Tanggal Input harus diisi!'
		]);
		$this->form_validation->set_rules('ket_close', 'Keterangan Close', 'required', [
			'required' => 'Keterangan Close harus diisi!'
		]);
		$this->form_validation->set_rules('seg_close', 'Seg Close', 'required', [
			'required' => 'Seg Close harus diisi!',
		]);
		$this->form_validation->set_rules('subseg_close', 'Subseg Close', 'required', [
			'required' => 'Subseg Close harus diisi!',
		]);
		$this->form_validation->set_rules('status', 'Status', 'required', [
			'required' => 'Status harus diisi!'
		]);
		$this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'required', [
			'required' => 'Nama Teknisi harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_teknisi', 'Jenis Teknisi', 'required', [
			'required' => 'Jenis Teknisi harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nd_inet' => $this->input->post('nd_inet'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'type_pelanggan' => $this->input->post('type_pelanggan'),
				'tgl_input' => $this->input->post('tgl_input'),
				'ket_close' => $this->input->post('ket_close'),
				'seg_close' => $this->input->post('seg_close'),
				'subseg_close' => $this->input->post('subseg_close'),
				'status' => $this->input->post('status'),
				'nama_teknisi' => $this->input->post('nama_teknisi'),
				'jenis_teknisi' => $this->input->post('jenis_teknisi'),
			];

			$insert = $this->saldo->insertSaldo($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('saldo', 'refresh');
		}
	}

	public function edit($id)
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$saldo = $this->saldo->getSaldoById($id);
		if (!$saldo) {
			show_404();
		}

		$data = [
			'title' => 'Edit Data Saldo',
			'judul' => 'Edit Data Saldo',
			'page' => 'saldo/v_editSaldo',
			'saldo' => $saldo,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array(),
			'nd_inet' => $this->saldo->get_list_nd_inet(),
			'nama_teknisi' => $this->saldo->getnamateknisi()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('saldo/v_editsaldo', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nd_inet', 'ND Inet', 'required', [
			'required' => 'ND Inet harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', [
			'required' => 'Jenis Saldo harus diisi!'
		]);
		$this->form_validation->set_rules('type_pelanggan', 'Type Pelanggan', 'required', [
			'required' => 'Type Pelanggan harus diisi!'
		]);
		$this->form_validation->set_rules('tgl_input', 'Tanggal Input', 'required', [
			'required' => 'Tanggal Input harus diisi!'
		]);
		$this->form_validation->set_rules('ket_close', 'Keterangan Close', 'required', [
			'required' => 'Keterangan Close harus diisi!'
		]);
		$this->form_validation->set_rules('seg_close', 'Seg Close', 'required', [
			'required' => 'Seg Close harus diisi!',
		]);
		$this->form_validation->set_rules('subseg_close', 'Subseg Close', 'required', [
			'required' => 'Subseg Close harus diisi!',
		]);
		$this->form_validation->set_rules('status', 'Status', 'required', [
			'required' => 'Status harus diisi!'
		]);
		$this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'required', [
			'required' => 'Nama Teknisi harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_teknisi', 'Jenis Teknisi', 'required', [
			'required' => 'Jenis Teknisi harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nd_inet' => $this->input->post('nd_inet'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'type_pelanggan' => $this->input->post('type_pelanggan'),
				'tgl_input' => $this->input->post('tgl_input'),
				'ket_close' => $this->input->post('ket_close'),
				'seg_close' => $this->input->post('seg_close'),
				'subseg_close' => $this->input->post('subseg_close'),
				'status' => $this->input->post('status'),
				'nama_teknisi' => $this->input->post('nama_teknisi'),
				'jenis_teknisi' => $this->input->post('jenis_teknisi'),
			];

			$update = $this->saldo->updateSaldo($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('saldo');
		}
	}

	public function delete($id)
	{
		$delete = $this->saldo->deleteSaldo($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('saldo');
	}

	public function uploadCsv()
	{
		if (!empty($_FILES['csv_file']['name'])) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");

			$header = fgetcsv($handle, 1000, ","); // lewati header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					'nd_inet'        => trim($row[0]),
					'jenis_saldo'    => trim($row[1]),
					'type_pelanggan' => trim($row[2]),
					'tgl_input'      => trim($row[3]),
					'ket_close'      => trim($row[4]),
					'seg_close'      => trim($row[5]),
					'subseg_close'   => trim($row[6]),
					'status'         => trim($row[7]),
					'nama_teknisi'   => trim($row[8]),
					'jenis_teknisi'  => trim($row[9]),
				];
				$this->db->insert('us_saldo_harian', $data);
			}

			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}

		redirect('saldo');
	}
}
