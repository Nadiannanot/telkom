<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Semesta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('toastr-error', 'Anda belum login');
			redirect('login', 'refresh');
		}
		$this->load->model('M_Semesta', 'semesta');
		$this->load->model('M_Uslis', 'uslis'); // Untuk relasi sektor
		$this->load->library('form_validation');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword', true);

		if (!empty($keyword)) {
			$semesta_data = $this->semesta->searchSemesta($keyword);
		} else {
			$semesta_data = $this->semesta->getAllSemesta();
		}

		$data = [
			'title' => 'Semesta',
			'page' => 'semesta/v_semesta',
			'judul' => 'Data Semesta',
			'semesta' => $semesta_data,
			'keyword' => $keyword
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Semesta',
			'page' => 'semesta/v_addSemesta',
			'uslis' => $this->uslis->getAllUslis()
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('s_sektor', 'Sektor', 'required', [
			'required' => 'Sektor harus diisi!'
		]);
		$this->form_validation->set_rules('s_node_id_ip', 'Node ID IP', 'required', [
			'required' => 'Node ID IP harus diisi!'
		]);
		$this->form_validation->set_rules('s_shelf_slot_port_onu', 'Shelf Slot Port ONU', 'required', [
			'required' => 'Shelf Slot Port ONU harus diisi!'
		]);
		$this->form_validation->set_rules('s_fiber_lenght', 'Fiber Length', 'required', [
			'required' => 'Fiber Length harus diisi!'
		]);
		$this->form_validation->set_rules('s_sto', 'STO', 'required', [
			'required' => 'STO harus diisi!'
		]);
		$this->form_validation->set_rules('s_odc', 'ODC', 'required', [
			'required' => 'ODC harus diisi!'
		]);
		$this->form_validation->set_rules('s_odp', 'ODP', 'required', [
			'required' => 'ODP harus diisi!'
		]);
		$this->form_validation->set_rules('s_nd_inet', 'ND INET', 'required', [
			'required' => 'ND INET harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				's_nd_inet' => $this->input->post('s_nd_inet', true),
				's_node_id_ip' => $this->input->post('s_node_id_ip', true),
				's_shelf_slot_port_onu' => $this->input->post('s_shelf_slot_port_onu', true),
				's_fiber_lenght' => $this->input->post('s_fiber_lenght', true),
				's_sto' => $this->input->post('s_sto', true),
				's_odc' => $this->input->post('s_odc', true),
				's_odp' => $this->input->post('s_odp', true),
				's_sektor' => $this->input->post('s_sektor', true)
			];

			$insert = $this->semesta->insertSemesta($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('semesta', 'refresh');
		}
	}

	public function edit($id)
	{
		$semesta = $this->semesta->getSemestaById($id);
		if (!$semesta) {
			show_404();
		}

		$data = [
			'title' => 'Edit Data Semesta',
			'judul' => 'Edit Data Semesta',
			'page' => 'semesta/v_editSemesta',
			'semesta' => $semesta,
			'uslis' => $this->uslis->getAllUslis()
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('s_sektor', 'Sektor', 'required', [
			'required' => 'Sektor harus diisi!'
		]);
		$this->form_validation->set_rules('s_node_id_ip', 'Node ID IP', 'required', [
			'required' => 'Node ID IP harus diisi!'
		]);
		$this->form_validation->set_rules('s_shelf_slot_port_onu', 'Shelf Slot Port ONU', 'required', [
			'required' => 'Shelf Slot Port ONU harus diisi!'
		]);
		$this->form_validation->set_rules('s_fiber_lenght', 'Fiber Length', 'required', [
			'required' => 'Fiber Length harus diisi!'
		]);
		$this->form_validation->set_rules('s_sto', 'STO', 'required', [
			'required' => 'STO harus diisi!'
		]);
		$this->form_validation->set_rules('s_odc', 'ODC', 'required', [
			'required' => 'ODC harus diisi!'
		]);
		$this->form_validation->set_rules('s_odp', 'ODP', 'required', [
			'required' => 'ODP harus diisi!'
		]);
		$this->form_validation->set_rules('s_nd_inet', 'ND INET', 'required', [
			'required' => 'ND INET harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				's_nd_inet' => $this->input->post('s_nd_inet', true),
				's_node_id_ip' => $this->input->post('s_node_id_ip', true),
				's_shelf_slot_port_onu' => $this->input->post('s_shelf_slot_port_onu', true),
				's_fiber_lenght' => $this->input->post('s_fiber_lenght', true),
				's_sto' => $this->input->post('s_sto', true),
				's_odc' => $this->input->post('s_odc', true),
				's_odp' => $this->input->post('s_odp', true),
				's_sektor' => $this->input->post('s_sektor', true)
			];

			$update = $this->semesta->updateSemesta($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('semesta');
		}
	}

	public function delete($id)
	{
		$delete = $this->semesta->deleteSemesta($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('semesta');
	}

	public function upload_excel()
	{
		if (!empty($_FILES['file_excel']['name'])) {
			$file = $_FILES['file_excel']['tmp_name'];

			try {
				$spreadsheet = IOFactory::load($file);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

				$data = [];
				for ($i = 2; $i <= count($sheet); $i++) {
					if (empty($sheet[$i]['A'])) continue;

					$data[] = [
						's_nd_inet' => trim($sheet[$i]['A']),
						's_node_id_ip' => trim($sheet[$i]['B']),
						's_shelf_slot_port_onu' => trim($sheet[$i]['C']),
						's_fiber_lenght' => trim($sheet[$i]['D']),
						's_sto' => trim($sheet[$i]['E']),
						's_odc' => trim($sheet[$i]['F']),
						's_odp' => trim($sheet[$i]['G']),
						's_sektor' => trim($sheet[$i]['H'])
					];
				}

				if (!empty($data)) {
					$this->db->insert_batch('us_semesta', $data);
					$this->session->set_flashdata('toastr-success', 'Data berhasil diupload!');
				} else {
					$this->session->set_flashdata('toastr-error', 'Data kosong atau tidak valid!');
				}
			} catch (Exception $e) {
				$this->session->set_flashdata('toastr-error', 'Gagal membaca file Excel!');
			}
		} else {
			$this->session->set_flashdata('toastr-error', 'File belum dipilih!');
		}

		redirect('semesta');
	}
}
