<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_login'))) {
			redirect('login', 'refresh');
		}
		$this->load->model('M_Order', 'order');
	}

	public function index()
	{
		$q = $this->input->get('q');
		if ($q) {
			$order = $this->order->searchOrder($q);
		} else {
			$order = $this->order->getAllOrder();
		}
		$data = [
			'title' => 'Data Order',
			'page'  => 'order/v_order',
			'order' => $order
		];
		$this->load->view('layout/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Tambah Order',
			'page'  => 'order/v_addorder'
		];
		$this->load->view('layout/index', $data);
	}

	public function postTambah()
	{
		$this->form_validation->set_rules('no_ticket', 'No Ticket', 'required');
		$this->form_validation->set_rules('service_no', 'Service No', 'required');
		$this->form_validation->set_rules('reported_date', 'Reported Date', 'required');
		$this->form_validation->set_rules('closed_date', 'Closed Date', 'required');
		$this->form_validation->set_rules('nik_teknisi', 'NIK Teknisi', 'required');
		$this->form_validation->set_rules('jenis_order', 'Jenis Order', 'required');
		$this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required');
		$this->form_validation->set_rules('sektor', 'Sektor', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = [
				'no_ticket'     => $this->input->post('no_ticket'),
				'service_no'    => $this->input->post('service_no'),
				'reported_date' => $this->input->post('reported_date'),
				'closed_date'   => $this->input->post('closed_date'),
				'nik_teknisi'   => $this->input->post('nik_teknisi'),
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
		$data = [
			'title' => 'Edit Order',
			'page'  => 'order/v_editorder',
			'order' => $order
		];
		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('no_ticket', 'No Ticket', 'required');
		$this->form_validation->set_rules('service_no', 'Service No', 'required');
		$this->form_validation->set_rules('reported_date', 'Reported Date', 'required');
		$this->form_validation->set_rules('closed_date', 'Closed Date', 'required');
		$this->form_validation->set_rules('nik_teknisi', 'NIK Teknisi', 'required');
		$this->form_validation->set_rules('jenis_order', 'Jenis Order', 'required');
		$this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required');
		$this->form_validation->set_rules('sektor', 'Sektor', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'no_ticket'     => $this->input->post('no_ticket'),
				'service_no'    => $this->input->post('service_no'),
				'reported_date' => $this->input->post('reported_date'),
				'closed_date'   => $this->input->post('closed_date'),
				'nik_teknisi'   => $this->input->post('nik_teknisi'),
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
					'jenis_order'   => $row[5],
					'segmentasi'    => $row[6],
					'sektor'        => $row[7]
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
