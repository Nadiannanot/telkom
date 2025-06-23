<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Cp extends CI_Controller
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

		$this->load->model('M_Cp', 'cp');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		if (!empty($keyword)) {
			$cp_data = $this->cp->searchCp($keyword);
		} else {
			$cp_data = $this->cp->getAllCp();
		}

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'CP',
			'page' => 'cp/v_cp',
			'cp' => $cp_data,
			'keyword' => $keyword,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Cp/v_cp', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Tambah CP',
			'page' => 'cp/v_addCp',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Cp/v_addcp', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nd_inet', 'ND Inet', 'required', [
			'required' => 'ND Inet harus diisi!'
		]);
		$this->form_validation->set_rules('cp_dossier', 'CP Dossier', 'required', [
			'required' => 'CP Dossier harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nd_inet'     => $this->input->post('nd_inet'),
				'cp_dossier'  => $this->input->post('cp_dossier'),
			];

			$insert = $this->cp->insertCp($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('cp', 'refresh');
		}
	}

	public function edit($id)
	{
		$cp = $this->cp->getCpById($id);
		if (!$cp) {
			show_404();
		}

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Edit CP',
			'page' => 'cp/v_editCp',
			'cp' => $cp,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Cp/v_editcp', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nd_inet', 'ND Inet', 'required', [
			'required' => 'ND Inet harus diisi!'
		]);
		$this->form_validation->set_rules('cp_dossier', 'CP Dossier', 'required', [
			'required' => 'CP Dossier harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nd_inet'     => $this->input->post('nd_inet'),
				'cp_dossier'  => $this->input->post('cp_dossier'),
			];

			$update = $this->cp->updateCp($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('cp');
		}
	}

	public function delete($id)
	{
		$delete = $this->cp->deleteCp($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('cp');
	}

	public function upload_excel()
	{
		if (!empty($_FILES['file_excel']['name'])) {
			$file = $_FILES['file_excel']['tmp_name'];

			$spreadsheet = IOFactory::load($file);
			$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

			for ($i = 2; $i <= count($sheet); $i++) {
				$data[] = [
					'nd_inet'    => $sheet[$i]['A'],
					'cp_dossier' => $sheet[$i]['B']
				];
			}

			$this->db->insert_batch('db_cp', $data);
			$this->session->set_flashdata('message', 'Data berhasil diupload!');
		} else {
			$this->session->set_flashdata('error', 'File belum dipilih!');
		}

		redirect('cp');
	}
}
