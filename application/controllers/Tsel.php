<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Tsel extends CI_Controller
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

		$this->load->model('M_Tsel', 'tsel');
		$this->load->model('M_Saldo', 'saldo');  // Load model saldo untuk relasi
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');

		if (!empty($keyword)) {
			$tsel_data = $this->tsel->searchTsel($keyword);
		} else {
			$tsel_data = $this->tsel->getAllTsel();
		}

		$email = $this->session->userdata('email'); // tambahkan baris ini
		$saldo_data = $this->saldo->getAllSaldo();  // Ambil data saldo
		$data = [
			'title'   => 'Tsel',
			'page'    => 'tsel/v_tsel',
			'tsel'    => $tsel_data,
			'saldo'   => $saldo_data,
			'keyword' => $keyword,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('tsel/v_tsel', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$data = [
			'title' => 'Tambah Tsel',
			'page'  => 'tsel/v_addTsel',
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('tsel/v_addTsel', $data);
		$this->load->view('templates/footer');
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nd_inet', 'ND Inet', 'required', [
			'required' => 'ND Inet harus diisi!'
		]);
		$this->form_validation->set_rules('ncli_inet', 'NCLI Inet', 'required', [
			'required' => 'NCLI Inet harus diisi!'
		]);
		$this->form_validation->set_rules('flag_hvc', 'Flag HVC', 'required', [
			'required' => 'Flag HVC harus diisi!'
		]);
		$this->form_validation->set_rules('reg', 'REG', 'required', [
			'required' => 'REG harus diisi!'
		]);
		$this->form_validation->set_rules('witel', 'WITEL', 'required', [
			'required' => 'WITEL harus diisi!'
		]);
		$this->form_validation->set_rules('datel_ncx', 'DATEL NCX', 'required', [
			'required' => 'DATEL NCX harus diisi!'
		]);
		$this->form_validation->set_rules('sto', 'STO', 'required', [
			'required' => 'STO harus diisi!'
		]);
		$this->form_validation->set_rules('cdatel', 'CDATEL', 'required', [
			'required' => 'CDATEL harus diisi!'
		]);
		$this->form_validation->set_rules('nd_pots', 'ND POTS', 'required', [
			'required' => 'ND POTS harus diisi!'
		]);
		$this->form_validation->set_rules('cwitel', 'CWITEL', 'required', [
			'required' => 'CWITEL harus diisi!'
		]);
		$this->form_validation->set_rules('odc', 'ODC', 'required', [
			'required' => 'ODC harus diisi!'
		]);
		$this->form_validation->set_rules('odp', 'ODP', 'required', [
			'required' => 'ODP harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nd_inet'   => $this->input->post('nd_inet'),
				'ncli_inet' => $this->input->post('ncli_inet'),
				'flag_hvc'  => $this->input->post('flag_hvc'),
				'reg'       => $this->input->post('reg'),
				'witel'     => $this->input->post('witel'),
				'datel_ncx' => $this->input->post('datel_ncx'),
				'sto'       => $this->input->post('sto'),
				'cdatel'    => $this->input->post('cdatel'),
				'nd_pots'   => $this->input->post('nd_pots'),
				'cwitel'    => $this->input->post('cwitel'),
				'odc'       => $this->input->post('odc'),
				'odp'       => $this->input->post('odp'),
			];

			$insert = $this->tsel->insertTsel($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('tsel', 'refresh');
		}
	}

	public function edit($id)
	{
		$email = $this->session->userdata('email'); // tambahkan baris ini
		$tsel = $this->tsel->getTselById($id);
		if (!$tsel) {
			show_404();
		}

		$data = [
			'title' => 'Edit Tsel',
			'page'  => 'tsel/v_editTsel',
			'tsel'  => $tsel,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('tsel/v_editTsel', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nd_inet', 'ND Inet', 'required', [
			'required' => 'ND Inet harus diisi!'
		]);
		$this->form_validation->set_rules('ncli_inet', 'NCLI Inet', 'required', [
			'required' => 'NCLI Inet harus diisi!'
		]);
		$this->form_validation->set_rules('flag_hvc', 'Flag HVC', 'required', [
			'required' => 'Flag HVC harus diisi!'
		]);
		$this->form_validation->set_rules('reg', 'REG', 'required', [
			'required' => 'REG harus diisi!'
		]);
		$this->form_validation->set_rules('witel', 'WITEL', 'required', [
			'required' => 'WITEL harus diisi!'
		]);
		$this->form_validation->set_rules('datel_ncx', 'DATEL NCX', 'required', [
			'required' => 'DATEL NCX harus diisi!'
		]);
		$this->form_validation->set_rules('sto', 'STO', 'required', [
			'required' => 'STO harus diisi!'
		]);
		$this->form_validation->set_rules('cdatel', 'CDATEL', 'required', [
			'required' => 'CDATEL harus diisi!'
		]);
		$this->form_validation->set_rules('nd_pots', 'ND POTS', 'required', [
			'required' => 'ND POTS harus diisi!'
		]);
		$this->form_validation->set_rules('cwitel', 'CWITEL', 'required', [
			'required' => 'CWITEL harus diisi!'
		]);
		$this->form_validation->set_rules('odc', 'ODC', 'required', [
			'required' => 'ODC harus diisi!'
		]);
		$this->form_validation->set_rules('odp', 'ODP', 'required', [
			'required' => 'ODP harus diisi!'
		]);

		$id = $this->input->post('id_tsel');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nd_inet'   => $this->input->post('nd_inet'),
				'ncli_inet' => $this->input->post('ncli_inet'),
				'flag_hvc'  => $this->input->post('flag_hvc'),
				'reg'       => $this->input->post('reg'),
				'witel'     => $this->input->post('witel'),
				'datel_ncx' => $this->input->post('datel_ncx'),
				'sto'       => $this->input->post('sto'),
				'cdatel'    => $this->input->post('cdatel'),
				'nd_pots'   => $this->input->post('nd_pots'),
				'cwitel'    => $this->input->post('cwitel'),
				'odc'       => $this->input->post('odc'),
				'odp'       => $this->input->post('odp'),
			];

			$update = $this->tsel->updateTsel($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('tsel');
		}
	}

	public function delete($id)
	{
		$delete = $this->tsel->deleteTsel($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('tsel');
	}

	public function uploadCsv()
	{
		if ($_FILES['csv_file']['name']) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");

			$header = fgetcsv($handle, 1000, ","); // skip header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					'nd_inet'    => $row[0],
					'ncli_inet'  => $row[1],
					'flag_hvc'   => $row[2],
					'reg'        => $row[3],
					'witel'      => $row[4],
					'datel_ncx'  => $row[5],
					'sto'        => $row[6],
					'cdatel'     => $row[7],
					'nd_pots'    => $row[8],
					'cwitel'     => $row[9],
					'odc'        => $row[10],
					'odp'        => $row[11]
				];
				$this->db->insert('tsel', $data);
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}

		redirect('tsel');
	}
}
