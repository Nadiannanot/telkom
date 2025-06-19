<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Tsel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('toastr-error', 'Anda belum login');
			redirect('login', 'refresh');
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

		$saldo_data = $this->saldo->getAllSaldo();  // Ambil data saldo

		$data = [
			'title'   => 'Tsel',
			'page'    => 'tsel/v_tsel',
			'tsel'    => $tsel_data,
			'saldo'   => $saldo_data,
			'keyword' => $keyword
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Tsel',
			'page'  => 'tsel/v_addTsel'
		];

		$this->load->view('layout/index', $data);
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
		$tsel = $this->tsel->getTselById($id);
		if (!$tsel) {
			show_404();
		}

		$data = [
			'title' => 'Edit Tsel',
			'page'  => 'tsel/v_editTsel',
			'tsel'  => $tsel
		];

		$this->load->view('layout/index', $data);
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

	public function upload_excel()
	{
		if (!empty($_FILES['file_excel']['name'])) {
			$file = $_FILES['file_excel']['tmp_name'];

			// Load spreadsheet
			$spreadsheet = IOFactory::load($file);
			$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

			// Lewati header (baris pertama)
			for ($i = 2; $i <= count($sheet); $i++) {
				$data[] = [
					'nd_inet'   => $sheet[$i]['A'],
					'ncli_inet' => $sheet[$i]['B'],
					'flag_hvc'  => $sheet[$i]['C'],
					'reg'       => $sheet[$i]['D'],
					'witel'     => $sheet[$i]['E'],
					'datel_ncx' => $sheet[$i]['F'],
					'sto'       => $sheet[$i]['G'],
					'cdatel'    => $sheet[$i]['H'],
					'nd_pots'   => $sheet[$i]['I'],
					'cwitel'    => $sheet[$i]['J'],
					'odc'       => $sheet[$i]['K'],
					'odp'       => $sheet[$i]['L']
				];
			}

			// Simpan ke database
			$this->db->insert_batch('tsel', $data);

			$this->session->set_flashdata('message', 'Data berhasil diupload!');
		} else {
			$this->session->set_flashdata('error', 'File belum dipilih!');
		}

		redirect('tsel');
	}
}
