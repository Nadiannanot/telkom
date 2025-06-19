<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Contoh jika ada login check
        if (empty($this->session->userdata('user_login'))) {
            $this->session->set_flashdata('toastr-error', 'Anda belum login');
            redirect('login', 'refresh');
        }

        $this->load->model('M_Teknisi', 'teknisi');
    }

    public function index()
    {
            $keyword = $this->input->get('keyword');

        if ($keyword) {
            $this->db->like('nik_teknisi', $keyword);
        }

        $data = [
            'title' => 'Data Teknisi',
            'page'  => 'teknisi/v_teknisi',
            'teknisi' => $this->db->get('teknisi')->result()
        ];

        $this->load->view('layout/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Teknisi',
            'page'  => 'teknisi/v_addTeknisi'
        ];

        $this->load->view('layout/index', $data);
    }

    public function postAdd()
    {
        $data = [
            'nik_teknisi'  => $this->input->post('nik_teknisi'),
            'nama_teknisi' => $this->input->post('nama_teknisi'),
            'sektor'       => $this->input->post('sektor'),
            'jenis'        => $this->input->post('jenis'),
            'status'       => $this->input->post('status')
        ];

        $insert = $this->teknisi->insert($data);

        $this->session->set_flashdata(
            $insert ? 'toastr-success' : 'toastr-error',
            $insert ? 'Data berhasil ditambahkan!' : 'Data gagal ditambahkan!'
        );

        redirect('teknisi');
    }

    public function edit($nik)
    {
        $teknisi = $this->teknisi->getById($nik);
        if (!$teknisi) {
            show_404();
        }

        $data = [
            'title'   => 'Edit Teknisi',
            'page'    => 'teknisi/v_editTeknisi',
            'teknisi' => $teknisi
        ];

        $this->load->view('layout/index', $data);
    }

    public function update()
    {
        $nik = $this->input->post('nik_teknisi');

        $data = [
            'nama_teknisi' => $this->input->post('nama_teknisi'),
            'sektor'       => $this->input->post('sektor'),
            'jenis'        => $this->input->post('jenis'),
            'status'       => $this->input->post('status')
        ];

        $update = $this->teknisi->update($nik, $data);

        $this->session->set_flashdata(
            $update ? 'toastr-success' : 'toastr-error',
            $update ? 'Data berhasil diubah!' : 'Data gagal diubah!'
        );

        redirect('teknisi');
    }

    public function hapus($nik)
    {
        $delete = $this->teknisi->delete($nik);

        $this->session->set_flashdata(
            $delete ? 'toastr-success' : 'toastr-error',
            $delete ? 'Data berhasil dihapus!' : 'Data gagal dihapus!'
        );

        redirect('teknisi');
    }
}
