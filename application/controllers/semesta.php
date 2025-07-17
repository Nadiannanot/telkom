<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Semesta extends CI_Controller
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

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Semesta',
			'page' => 'semesta/v_semesta',
			'judul' => 'Data Semesta',
			'semesta' => $semesta_data,
			'keyword' => $keyword,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('semesta/v_semesta', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Tambah Semesta',
			'page' => 'semesta/v_addSemesta',
			'uslis' => $this->uslis->getAllUslis(),
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array(), // perbaiki baris ini
			'sektor' => $this->db->get('sektor')->result_array()
		];
		
		$data['db_cp'] = $this->db->get('db_cp')->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('semesta/v_addSemesta', $data);
		$this->load->view('templates/footer');
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

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Edit Data Semesta',
			'judul' => 'Edit Data Semesta',
			'page' => 'semesta/v_editSemesta',
			'semesta' => $semesta,
			'uslis' => $this->uslis->getAllUslis(),
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$data['sektor'] = $this->db->get('sektor')->result_array();
		$data['db_cp'] = $this->db->get('db_cp')->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('semesta/v_editSemesta', $data);
		$this->load->view('templates/footer');
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

	public function uploadCsv()
	{
		if ($_FILES['csv_file']['name']) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");

			$header = fgetcsv($handle, 1000, ","); // skip header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					's_nd_inet'   			 => $row[0],
					's_sektor'				 => $row[1],
					's_node_id_ip' 			 => $row[2],
					's_shelf_slot_port_onu'  => $row[3],
					's_fiber_lenght'      	 => $row[4],
					's_sto'  				 => $row[5],
					's_odc'   			     => $row[6],
					's_odp'    				 => $row[7],

				];
				$this->db->insert('us_semesta', $data);
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}

		redirect('semesta');
	}
}
