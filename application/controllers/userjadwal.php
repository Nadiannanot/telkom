<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userjadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        // Hanya user role_id 2 yang boleh akses
        if ($this->session->userdata('role_id') != 2) {
            redirect('admin');
        }
        $this->load->model('M_Jadwal', 'jadwal');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $jadwal_data = $this->jadwal->searchJadwal($keyword);
        } else {
            $jadwal_data = $this->jadwal->getAllJadwal();
        }

        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Jadwal Teknisi',
            'page' => 'userjadwal/v_userjadwal',
            'judul' => 'Data Jadwal Teknisi',
            'jadwal' => $jadwal_data,
            'keyword' => $keyword,
            'user' => $this->db->get_where('user', ['email' => $email])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userjadwal/v_userjadwal', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $jadwal = $this->jadwal->getJadwalById($id);
        if (!$jadwal) {
            show_404();
        }

        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Edit Jadwal Teknisi',
            'judul' => 'Edit Jadwal Teknisi',
            'page' => 'userjadwal/v_editUserjadwal',
            'jadwal' => $jadwal,
            'user' => $this->db->get_where('user', ['email' => $email])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userjadwal/v_editUserjadwal', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required', [
            'required' => 'NIK harus diisi!'
        ]);
        $this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'required', [
            'required' => 'Nama Teknisi harus diisi!'
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

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nik'           => $this->input->post('nik'),
                'nama_teknisi'  => $this->input->post('nama_teknisi'),
                'tgl'           => $this->input->post('tgl'),
                'sektor'        => $this->input->post('sektor'),
                'status'        => $this->input->post('status')
            ];

            $update = $this->jadwal->updateJadwal($id, $data);

            if ($update) {
                $this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
            } else {
                $this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
            }

            redirect('userjadwal');
        }
    }
}
