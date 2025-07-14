<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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

		$this->load->model('M_Jadwal', 'jadwal');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title'  => 'Jadwal',
			'page'   => 'jadwal/v_jadwal',
			'jadwal' => !empty($keyword) ? $this->jadwal->searchJadwal($keyword) : $this->jadwal->getAllJadwalWithTeknisi(),
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jadwal/v_jadwal', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email');
		$data = [
			'title'    => 'Tambah Jadwal',
			'page'     => 'jadwal/v_addJadwal',
			'user'     => $this->db->get_where('user', ['email' => $email])->row_array(),
			'teknisi'  => $this->db->get('teknisi')->result_array() // <-- tambahkan baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jadwal/v_addJadwal', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required', [
			'required' => 'NIK harus diisi!'
		]);
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required', [
			'required' => 'Tanggal harus diisi!'
		]);
		$this->form_validation->set_rules('sektor', 'Sektor', 'required', [
			'required' => 'Sektor harus diisi!'
		]);
		$this->form_validation->set_rules('status', 'Status', 'required', [
			'required' => 'Status harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nik'    => $this->input->post('nik'),
				'tgl'    => $this->input->post('tgl'),
				'sektor' => $this->input->post('sektor'),
				'status' => $this->input->post('status'),
			];

			$insert = $this->jadwal->insertJadwal($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('jadwal', 'refresh');
		}
	}

	public function edit($id)
	{
		$jadwal = $this->jadwal->getJadwalById($id);
		if (!$jadwal) {
			show_404();
		}

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title'  => 'Edit Jadwal',
			'page'   => 'jadwal/v_editJadwal',
			'jadwal' => $jadwal,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jadwal/v_editJadwal', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required', [
			'required' => 'NIK harus diisi!'
		]);
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required', [
			'required' => 'Tanggal harus diisi!'
		]);
		$this->form_validation->set_rules('sektor', 'Sektor', 'required', [
			'required' => 'Sektor harus diisi!'
		]);
		$this->form_validation->set_rules('status', 'Status', 'required', [
			'required' => 'Status harus diisi!'
		]);

		$id = $this->input->post('id_jadwal');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nik'    => $this->input->post('nik'),
				'tgl'    => $this->input->post('tgl'),
				'sektor' => $this->input->post('sektor'),
				'status' => $this->input->post('status'),
			];

			$update = $this->jadwal->updateJadwal($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('jadwal');
		}
	}

	public function delete($id)
	{
		$delete = $this->jadwal->deleteJadwal($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('jadwal');
	}

	public function uploadCsv()
	{
		if ($_FILES['csv_file']['name']) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");
			$header = fgetcsv($handle, 1000, ",");

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if (count($row) >= 4) {
					$data = [
						'nik'    => $row[0],
						'tgl'    => $row[1],
						'sektor' => $row[2],
						'status' => $row[3]
					];
					$this->jadwal->insertJadwal($data);
				}
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}
		redirect('jadwal');
	}
}
