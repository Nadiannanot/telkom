<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
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

        $this->load->model('M_Teknisi', 'teknisi');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        if ($keyword) {
            $this->db->like('nik_teknisi', $keyword);
        }
        $email = $this->session->userdata('email'); // tambahkan baris ini
        $data = [
            'title' => 'Data Teknisi',
            'page'  => 'teknisi/v_teknisi',
            'teknisi' => $this->db->get('teknisi')->result(),
            'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/v_teknisi', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $email = $this->session->userdata('email'); // tambahkan baris ini
        $data = [
            'title' => 'Tambah Teknisi',
            'page'  => 'teknisi/v_addTeknisi',
            'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/v_addTeknisi', $data);
        $this->load->view('templates/footer');
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

        $email = $this->session->userdata('email'); // tambahkan baris ini
        $data = [
            'title'   => 'Edit Teknisi',
            'page'    => 'teknisi/v_editTeknisi',
            'teknisi' => $teknisi,
            'user'  => $this->db->get_where('user', ['email' => $email])->row_array() // perbaiki baris ini
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/v_editTeknisi', $data);
        $this->load->view('templates/footer');
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
