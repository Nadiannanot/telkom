<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Ibooster extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');
			redirect('login', 'refresh');
		}

		$this->load->model('M_Ibooster', 'ibooster');
	}

	public function index()
	{
		$data = [
			'title'    => 'Data Ibooster',
			'page'     => 'ibooster/v_ibooster',
			'ibooster' => $this->ibooster->getAllIbooster()
		];

		$this->load->view('layout/index', $data);
	}


	public function add()
	{
		$data = [
			'title' => 'Tambah Data Ibooster',
			'page'  => 'ibooster/v_addIbooster'
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nd_inet', 'ND INET', 'required', [
			'required' => 'ND INET harus diisi!'
		]);
		$this->form_validation->set_rules('ip_embassy', 'IP Embassy', 'required', [
			'required' => 'IP Embassy harus diisi!'
		]);
		$this->form_validation->set_rules('type_olt', 'Type OLT', 'required', [
			'required' => 'Type OLT harus diisi!'
		]);
		$this->form_validation->set_rules('cid', 'CID', 'required', [
			'required' => 'CID harus diisi!'
		]);
		$this->form_validation->set_rules('ip_ne', 'IP NE', 'required', [
			'required' => 'IP NE harus diisi!'
		]);
		$this->form_validation->set_rules('adsl_link_status', 'ADSL Link Status', 'required', [
			'required' => 'ADSL Link Status harus diisi!'
		]);
		$this->form_validation->set_rules('line_rate_1', 'Line Rate 1', 'numeric', [
			'numeric' => 'Line Rate 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('snr_1', 'SNR 1', 'numeric', [
			'numeric' => 'SNR 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attenuation_1', 'Attenuation 1', 'numeric', [
			'numeric' => 'Attenuation 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attainable_rate_1', 'Attainable Rate 1', 'numeric', [
			'numeric' => 'Attainable Rate 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('line_rate_2', 'Line Rate 2', 'numeric', [
			'numeric' => 'Line Rate 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('snr_2', 'SNR 2', 'numeric', [
			'numeric' => 'SNR 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attenuation_2', 'Attenuation 2', 'numeric', [
			'numeric' => 'Attenuation 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attainable_rate_2', 'Attainable Rate 2', 'numeric', [
			'numeric' => 'Attainable Rate 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('onu_link_status', 'ONU Link Status', 'required', [
			'required' => 'ONU Link Status harus diisi!'
		]);
		$this->form_validation->set_rules('onu_serial_number', 'ONU Serial Number', 'required', [
			'required' => 'ONU Serial Number harus diisi!'
		]);
		$this->form_validation->set_rules('fiber_length', 'Fiber Length', 'numeric', [
			'numeric' => 'Fiber Length harus berupa angka!'
		]);
		$this->form_validation->set_rules('olt_tx', 'OLT TX', 'numeric', [
			'numeric' => 'OLT TX harus berupa angka!'
		]);
		$this->form_validation->set_rules('olt_rx', 'OLT RX', 'numeric', [
			'numeric' => 'OLT RX harus berupa angka!'
		]);
		$this->form_validation->set_rules('onu_tx', 'ONU TX', 'numeric', [
			'numeric' => 'ONU TX harus berupa angka!'
		]);
		$this->form_validation->set_rules('onu_rx', 'ONU RX', 'numeric', [
			'numeric' => 'ONU RX harus berupa angka!'
		]);
		$this->form_validation->set_rules('type_onu', 'Type ONU', 'required', [
			'required' => 'Type ONU harus diisi!'
		]);
		$this->form_validation->set_rules('versionid', 'Version ID', 'required', [
			'required' => 'Version ID harus diisi!'
		]);
		$this->form_validation->set_rules('traffic_profile_up', 'Traffic Profile Up', 'required', [
			'required' => 'Traffic Profile Up harus diisi!'
		]);
		$this->form_validation->set_rules('traffic_profile_down', 'Traffic Profile Down', 'required', [
			'required' => 'Traffic Profile Down harus diisi!'
		]);
		$this->form_validation->set_rules('framed_ip_address', 'Framed IP Address', 'required', [
			'required' => 'Framed IP Address harus diisi!'
		]);
		$this->form_validation->set_rules('mac_address', 'MAC Address', 'required', [
			'required' => 'MAC Address harus diisi!'
		]);
		$this->form_validation->set_rules('last_seen', 'Last Seen', 'required', [
			'required' => 'Last Seen harus diisi!'
		]);
		$this->form_validation->set_rules('accstarttime', 'Acc Start Time', 'required', [
			'required' => 'Acc Start Time harus diisi!'
		]);
		$this->form_validation->set_rules('accstoptime', 'Acc Stop Time', 'required', [
			'required' => 'Acc Stop Time harus diisi!'
		]);
		$this->form_validation->set_rules('accessiontime', 'Accession Time', 'required', [
			'required' => 'Accession Time harus diisi!'
		]);
		$this->form_validation->set_rules('up', 'UP', 'required', [
			'required' => 'UP harus diisi!'
		]);
		$this->form_validation->set_rules('down', 'DOWN', 'required', [
			'required' => 'DOWN harus diisi!'
		]);
		$this->form_validation->set_rules('status_koneksi', 'Status Koneksi', 'required', [
			'required' => 'Status Koneksi harus diisi!'
		]);
		$this->form_validation->set_rules('nas_ip_address', 'NAS IP Address', 'required', [
			'required' => 'NAS IP Address harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			return $this->add();
		} else {
			$data = [
				'nd_inet'          => $this->input->post('nd_inet'),
				'ip_embassy'       => $this->input->post('ip_embassy'),
				'type_olt'         => $this->input->post('type_olt'),
				'cid'              => $this->input->post('cid'),
				'ip_ne'            => $this->input->post('ip_ne'),
				'adsl_link_status' => $this->input->post('adsl_link_status'),
				'line_rate_1'      => $this->input->post('line_rate_1'),
				'snr_1'            => $this->input->post('snr_1'),
				'attenuation_1'    => $this->input->post('attenuation_1'),
				'attainable_rate_1' => $this->input->post('attainable_rate_1'),
				'line_rate_2'      => $this->input->post('line_rate_2'),
				'snr_2'            => $this->input->post('snr_2'),
				'attenuation_2'    => $this->input->post('attenuation_2'),
				'attainable_rate_2' => $this->input->post('attainable_rate_2'),
				'onu_link_status'  => $this->input->post('onu_link_status'),
				'onu_serial_number' => $this->input->post('onu_serial_number'),
				'fiber_length'     => $this->input->post('fiber_length'),
				'olt_tx'           => $this->input->post('olt_tx'),
				'olt_rx'           => $this->input->post('olt_rx'),
				'onu_tx'           => $this->input->post('onu_tx'),
				'onu_rx'           => $this->input->post('onu_rx'),
				'type_onu'         => $this->input->post('type_onu'),
				'versionid'        => $this->input->post('versionid'),
				'traffic_profile_up' => $this->input->post('traffic_profile_up'),
				'traffic_profile_down' => $this->input->post('traffic_profile_down'),
				'framed_ip_address' => $this->input->post('framed_ip_address'),
				'mac_address'      => $this->input->post('mac_address'),
				'last_seen'        => $this->input->post('last_seen'),
				'accstarttime'     => $this->input->post('accstarttime'),
				'accstoptime'      => $this->input->post('accstoptime'),
				'accessiontime'    => $this->input->post('accessiontime'),
				'up'               => $this->input->post('up'),
				'down'             => $this->input->post('down'),
				'status_koneksi'   => $this->input->post('status_koneksi'),
				'nas_ip_address'   => $this->input->post('nas_ip_address')
			];

			$insert = $this->ibooster->insertIbooster($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('ibooster');
		}
	}

	public function edit($id)
	{
		$ibooster = $this->ibooster->getIboosterById($id);
		if (!$ibooster) {
			show_404();
		}

		$data = [
			'title'    => 'Edit Data iBooster',
			'page'     => 'ibooster/v_editIbooster',
			'ibooster' => $ibooster
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nd_inet', 'ND INET', 'required', [
			'required' => 'ND INET harus diisi!'
		]);
		$this->form_validation->set_rules('ip_embassy', 'IP Embassy', 'required', [
			'required' => 'IP Embassy harus diisi!'
		]);
		$this->form_validation->set_rules('type_olt', 'Type OLT', 'required', [
			'required' => 'Type OLT harus diisi!'
		]);
		$this->form_validation->set_rules('cid', 'CID', 'required', [
			'required' => 'CID harus diisi!'
		]);
		$this->form_validation->set_rules('ip_ne', 'IP NE', 'required', [
			'required' => 'IP NE harus diisi!'
		]);
		$this->form_validation->set_rules('adsl_link_status', 'ADSL Link Status', 'required', [
			'required' => 'ADSL Link Status harus diisi!'
		]);
		$this->form_validation->set_rules('line_rate_1', 'Line Rate 1', 'numeric', [
			'numeric' => 'Line Rate 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('snr_1', 'SNR 1', 'numeric', [
			'numeric' => 'SNR 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attenuation_1', 'Attenuation 1', 'numeric', [
			'numeric' => 'Attenuation 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attainable_rate_1', 'Attainable Rate 1', 'numeric', [
			'numeric' => 'Attainable Rate 1 harus berupa angka!'
		]);
		$this->form_validation->set_rules('line_rate_2', 'Line Rate 2', 'numeric', [
			'numeric' => 'Line Rate 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('snr_2', 'SNR 2', 'numeric', [
			'numeric' => 'SNR 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attenuation_2', 'Attenuation 2', 'numeric', [
			'numeric' => 'Attenuation 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('attainable_rate_2', 'Attainable Rate 2', 'numeric', [
			'numeric' => 'Attainable Rate 2 harus berupa angka!'
		]);
		$this->form_validation->set_rules('onu_link_status', 'ONU Link Status', 'required', [
			'required' => 'ONU Link Status harus diisi!'
		]);
		$this->form_validation->set_rules('onu_serial_number', 'ONU Serial Number', 'required', [
			'required' => 'ONU Serial Number harus diisi!'
		]);
		$this->form_validation->set_rules('fiber_length', 'Fiber Length', 'numeric', [
			'numeric' => 'Fiber Length harus berupa angka!'
		]);
		$this->form_validation->set_rules('olt_tx', 'OLT TX', 'numeric', [
			'numeric' => 'OLT TX harus berupa angka!'
		]);
		$this->form_validation->set_rules('olt_rx', 'OLT RX', 'numeric', [
			'numeric' => 'OLT RX harus berupa angka!'
		]);
		$this->form_validation->set_rules('onu_tx', 'ONU TX', 'numeric', [
			'numeric' => 'ONU TX harus berupa angka!'
		]);
		$this->form_validation->set_rules('onu_rx', 'ONU RX', 'numeric', [
			'numeric' => 'ONU RX harus berupa angka!'
		]);
		$this->form_validation->set_rules('type_onu', 'Type ONU', 'required', [
			'required' => 'Type ONU harus diisi!'
		]);
		$this->form_validation->set_rules('versionid', 'Version ID', 'required', [
			'required' => 'Version ID harus diisi!'
		]);
		$this->form_validation->set_rules('traffic_profile_up', 'Traffic Profile Up', 'required', [
			'required' => 'Traffic Profile Up harus diisi!'
		]);
		$this->form_validation->set_rules('traffic_profile_down', 'Traffic Profile Down', 'required', [
			'required' => 'Traffic Profile Down harus diisi!'
		]);
		$this->form_validation->set_rules('framed_ip_address', 'Framed IP Address', 'required', [
			'required' => 'Framed IP Address harus diisi!'
		]);
		$this->form_validation->set_rules('mac_address', 'MAC Address', 'required', [
			'required' => 'MAC Address harus diisi!'
		]);
		$this->form_validation->set_rules('last_seen', 'Last Seen', 'required', [
			'required' => 'Last Seen harus diisi!'
		]);
		$this->form_validation->set_rules('accstarttime', 'Acc Start Time', 'required', [
			'required' => 'Acc Start Time harus diisi!'
		]);
		$this->form_validation->set_rules('accstoptime', 'Acc Stop Time', 'required', [
			'required' => 'Acc Stop Time harus diisi!'
		]);
		$this->form_validation->set_rules('accessiontime', 'Accession Time', 'required', [
			'required' => 'Accession Time harus diisi!'
		]);
		$this->form_validation->set_rules('up', 'UP', 'required', [
			'required' => 'UP harus diisi!'
		]);
		$this->form_validation->set_rules('down', 'DOWN', 'required', [
			'required' => 'DOWN harus diisi!'
		]);
		$this->form_validation->set_rules('status_koneksi', 'Status Koneksi', 'required', [
			'required' => 'Status Koneksi harus diisi!'
		]);
		$this->form_validation->set_rules('nas_ip_address', 'NAS IP Address', 'required', [
			'required' => 'NAS IP Address harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			return $this->edit($id);
		} else {
			$data = [
				'nd_inet'            => $this->input->post('nd_inet'),
				'ip_embassy'         => $this->input->post('ip_embassy'),
				'type_olt'           => $this->input->post('type_olt'),
				'cid'                => $this->input->post('cid'),
				'ip_ne'              => $this->input->post('ip_ne'),
				'adsl_link_status'   => $this->input->post('adsl_link_status'),
				'line_rate_1'        => $this->input->post('line_rate_1'),
				'snr_1'              => $this->input->post('snr_1'),
				'attenuation_1'      => $this->input->post('attenuation_1'),
				'attainable_rate_1'  => $this->input->post('attainable_rate_1'),
				'line_rate_2'        => $this->input->post('line_rate_2'),
				'snr_2'              => $this->input->post('snr_2'),
				'attenuation_2'      => $this->input->post('attenuation_2'),
				'attainable_rate_2'  => $this->input->post('attainable_rate_2'),
				'onu_link_status'    => $this->input->post('onu_link_status'),
				'onu_serial_number'  => $this->input->post('onu_serial_number'),
				'fiber_length'       => $this->input->post('fiber_length'),
				'olt_tx'             => $this->input->post('olt_tx'),
				'olt_rx'             => $this->input->post('olt_rx'),
				'onu_tx'             => $this->input->post('onu_tx'),
				'onu_rx'             => $this->input->post('onu_rx'),
				'type_onu'           => $this->input->post('type_onu'),
				'versionid'          => $this->input->post('versionid'),
				'traffic_profile_up' => $this->input->post('traffic_profile_up'),
				'traffic_profile_down' => $this->input->post('traffic_profile_down'),
				'framed_ip_address'  => $this->input->post('framed_ip_address'),
				'mac_address'        => $this->input->post('mac_address'),
				'last_seen'          => $this->input->post('last_seen'),
				'accstarttime'       => $this->input->post('accstarttime'),
				'accstoptime'        => $this->input->post('accstoptime'),
				'accessiontime'      => $this->input->post('accessiontime'),
				'up'                 => $this->input->post('up'),
				'down'               => $this->input->post('down'),
				'status_koneksi'     => $this->input->post('status_koneksi'),
				'nas_ip_address'     => $this->input->post('nas_ip_address')
			];

			$update = $this->ibooster->updateIbooster($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diperbarui!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diperbarui!');
			}

			redirect('ibooster', 'refresh');
		}
	}

	public function delete($id)
	{
		$delete = $this->ibooster->deleteIbooster($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('ibooster', 'refresh');
	}

	public function upload_excel()
{
    if (!empty($_FILES['file_excel']['name'])) {
        $file = $_FILES['file_excel']['tmp_name'];

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $data = [];
        for ($i = 2; $i <= count($sheet); $i++) {
            $data[] = [
                'nd_inet'             => trim($sheet[$i]['A']),
                'ip_embassy'          => trim($sheet[$i]['B']),
                'type_olt'            => trim($sheet[$i]['C']),
                'cid'                 => trim($sheet[$i]['D']),
                'ip_ne'               => trim($sheet[$i]['E']),
                'adsl_link_status'    => trim($sheet[$i]['F']),
                'line_rate_1'         => trim($sheet[$i]['G']),
                'snr_1'               => trim($sheet[$i]['H']),
                'attenuation_1'       => trim($sheet[$i]['I']),
                'attainable_rate_1'   => trim($sheet[$i]['J']),
                'line_rate_2'         => trim($sheet[$i]['K']),
                'snr_2'               => trim($sheet[$i]['L']),
                'attenuation_2'       => trim($sheet[$i]['M']),
                'attainable_rate_2'   => trim($sheet[$i]['N']),
                'onu_link_status'     => trim($sheet[$i]['O']),
                'onu_serial_number'   => trim($sheet[$i]['P']),
                'fiber_length'        => trim($sheet[$i]['Q']),
                'olt_tx'              => trim($sheet[$i]['R']),
                'olt_rx'              => trim($sheet[$i]['S']),
                'onu_tx'              => trim($sheet[$i]['T']),
                'onu_rx'              => trim($sheet[$i]['U']),
                'type_onu'            => trim($sheet[$i]['V']),
                'versionid'           => trim($sheet[$i]['W']),
                'traffic_profile_up'  => trim($sheet[$i]['X']),
                'traffic_profile_down'=> trim($sheet[$i]['Y']),
                'framed_ip_address'   => trim($sheet[$i]['Z']),
                'mac_address'         => trim($sheet[$i]['AA']),
                'last_seen'           => trim($sheet[$i]['AB']),
                'accstarttime'        => trim($sheet[$i]['AC']),
                'accstoptime'         => trim($sheet[$i]['AD']),
                'accessiontime'       => trim($sheet[$i]['AE']),
                'up'                  => trim($sheet[$i]['AF']),
                'down'                => trim($sheet[$i]['AG']),
                'status_koneksi'      => trim($sheet[$i]['AH']),
                'nas_ip_address'      => trim($sheet[$i]['AI'])
            ];
        }

        $this->db->insert_batch('ibooster', $data);
        $this->session->set_flashdata('message', 'Data berhasil diupload!');
    } else {
        $this->session->set_flashdata('error', 'File belum dipilih!');
    }

    redirect('ibooster');
}
}