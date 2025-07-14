<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
		$this->load->model('M_Order', 'order');
	}

	public function index()
	{
		$q = $this->input->get('q');
		if ($q) {
			$order = $this->order->searchOrderWithRelasi($q); // Buat method ini jika ingin search pakai join
		} else {
			$order = $this->order->getAllOrderWithRelasi();
		}
		$email = $this->session->userdata('email');
		$data = [
			'title' => 'Data Order',
			'page'  => 'order/v_order',
			'order' => $order,
			'user'  => $this->db->get_where('user', ['email' => $email])->row_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('order/v_order', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$email = $this->session->userdata('email');
		$data = [
			'title'      => 'Tambah Order',
			'page'       => 'order/v_addorder',
			'user'       => $this->db->get_where('user', ['email' => $email])->row_array(),
			'teknisi'    => $this->db->get('teknisi')->result_array(),
			'jenisOrder' => $this->db->get('jenis_order')->result_array(),
			'sektor'     => $this->db->get('sektor')->result_array(),
			'segmentasi' => $this->db->get('seq_close')->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('order/v_addorder', $data);
		$this->load->view('templates/footer');
	}

	public function postTambah()
	{
		$this->form_validation->set_rules('no_ticket', 'No Ticket', 'required', [
			'required' => 'No Ticket harus diisi!'
		]);
		$this->form_validation->set_rules('service_no', 'Service No', 'required', [
			'required' => 'Service No harus diisi!'
		]);
		$this->form_validation->set_rules('reported_date', 'Reported Date', 'required', [
			'required' => 'Reported Date harus diisi!'
		]);
		$this->form_validation->set_rules('closed_date', 'Closed Date', 'required', [
			'required' => 'Closed Date harus diisi!'
		]);
		// $this->form_validation->set_rules('nik_teknisi', 'NIK Teknisi', 'required', [
		// 	'required' => 'NIK Teknisi harus diisi!'
		// ]);
		$this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'required', [
			'required' => 'Nama Teknisi harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_order', 'Jenis Order', 'required', [
			'required' => 'Jenis Order harus diisi!'
		]);
		$this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required', [
			'required' => 'Segmentasi harus diisi!'
		]);
		$this->form_validation->set_rules('sektor', 'Sektor', 'required', [
			'required' => 'Sektor harus diisi!'
		]);


		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = [
				'no_ticket'     => $this->input->post('no_ticket'),
				'service_no'    => $this->input->post('service_no'),
				'reported_date' => $this->input->post('reported_date'),
				'closed_date'   => $this->input->post('closed_date'),
				'nik_teknisi'   => $this->input->post('nik_teknisi'),
				'nama_teknisi'  => $this->input->post('nama_teknisi'),
				'jenis_order'   => $this->input->post('jenis_order'),
				'segmentasi'    => $this->input->post('segmentasi'),
				'sektor'        => $this->input->post('sektor')
			];
			$this->order->insertOrder($data);
			$this->session->set_flashdata('toastr-success', 'Data order berhasil ditambahkan.');
			redirect('order');
		}
	}

	public function edit($id)
	{
		$order = $this->order->getOrderById($id);
		if (!$order) show_404();
		$email = $this->session->userdata('email');
		$data = [
			'title'      => 'Edit Order',
			'page'       => 'order/v_editorder',
			'order'      => $order,
			'user'       => $this->db->get_where('user', ['email' => $email])->row_array(),
			'teknisi'    => $this->db->get('teknisi')->result_array(),
			'jenisOrder' => $this->db->get('jenis_order')->result_array(),
			'sektor'     => $this->db->get('sektor')->result_array(),
			'segmentasi' => $this->db->get('seq_close')->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('order/v_editorder', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('no_ticket', 'No Ticket', 'required', [
			'required' => 'No Ticket harus diisi!'
		]);
		$this->form_validation->set_rules('service_no', 'Service No', 'required', [
			'required' => 'Service No harus diisi!'
		]);
		$this->form_validation->set_rules('reported_date', 'Reported Date', 'required', [
			'required' => 'Reported Date harus diisi!'
		]);
		$this->form_validation->set_rules('closed_date', 'Closed Date', 'required', [
			'required' => 'Closed Date harus diisi!'
		]);
		$this->form_validation->set_rules('nik_teknisi', 'NIK Teknisi', 'required', [
			'required' => 'NIK Teknisi harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_order', 'Jenis Order', 'required', [
			'required' => 'Jenis Order harus diisi!'
		]);
		$this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required', [
			'required' => 'Segmentasi harus diisi!'
		]);
		$this->form_validation->set_rules('sektor', 'Sektor', 'required', [
			'required' => 'Sektor harus diisi!'
		]);


		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'no_ticket'     => $this->input->post('no_ticket'),
				'service_no'    => $this->input->post('service_no'),
				'reported_date' => $this->input->post('reported_date'),
				'closed_date'   => $this->input->post('closed_date'),
				'nik_teknisi'   => $this->input->post('nik_teknisi'),
				'nama_teknisi'  => $this->input->post('nama_teknisi'),
				'jenis_order'   => $this->input->post('jenis_order'),
				'segmentasi'    => $this->input->post('segmentasi'),
				'sektor'        => $this->input->post('sektor')
			];
			$this->order->updateOrder($id, $data);
			$this->session->set_flashdata('toastr-success', 'Data order berhasil diupdate.');
			redirect('order');
		}
	}

	public function delete($id)
	{
		$this->order->deleteOrder($id);
		$this->session->set_flashdata('toastr-success', 'Data order berhasil dihapus.');
		redirect('order');
	}

	public function uploadCsv()
	{
		if ($_FILES['csv_file']['name']) {
			$file = $_FILES['csv_file']['tmp_name'];
			$handle = fopen($file, "r");
			$header = fgetcsv($handle, 1000, ","); // skip header

			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$data = [
					'no_ticket'     => $row[0],
					'service_no'    => $row[1],
					'reported_date' => $row[2],
					'closed_date'   => $row[3],
					'nik_teknisi'   => $row[4],
					'nama_teknisi'  => $row[5],
					'jenis_order'   => $row[6],
					'segmentasi'    => $row[7],
					'sektor'        => $row[8]
				];
				$this->order->insertOrder($data);
			}
			fclose($handle);
			$this->session->set_flashdata('toastr-success', 'Upload CSV berhasil!');
		} else {
			$this->session->set_flashdata('toastr-error', 'File tidak ditemukan!');
		}
		redirect('order');
	}
}
