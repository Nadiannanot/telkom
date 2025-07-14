<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userteknisi extends CI_Controller
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

        $this->load->model('M_Userteknisi', 'userteknisi');
        $this->load->model('M_Teknisi', 'teknisi');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $teknisi_data = $this->userteknisi->searchTeknisi($keyword);
        } else {
            $teknisi_data = $this->userteknisi->getAllTeknisi();
        }

        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Data Teknisi',
            'page' => 'userteknisi/v_userteknisi',
            'judul' => 'Data Teknisi',
            'teknisi' => $teknisi_data,
            'keyword' => $keyword,
            'user' => $this->db->get_where('user', ['email' => $email])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userteknisi/v_userteknisi', $data);
        $this->load->view('templates/footer');
    }

    public function edit($nik_teknisi)
    {
        $userteknisi = $this->userteknisi->getTeknisiByNik($nik_teknisi);
        if (!$userteknisi) {
            show_404();
        }

        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Edit Teknisi',
            'judul' => 'Edit Teknisi',
            'page' => 'userteknisi/v_editUserteknisi',
            'teknisi' => $userteknisi,
            'user' => $this->db->get_where('user', ['email' => $email])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userteknisi/v_editUserteknisi', $data);
        $this->load->view('templates/footer');
    }

    public function update($nik_teknisi)
    {
        $this->form_validation->set_rules('nik_teknisi', 'NIK Teknisi', 'required');
        $this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'required');
        $this->form_validation->set_rules('sektor', 'Sektor', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($nik_teknisi);
        } else {
            $data = [
                'nik_teknisi'  => $this->input->post('nik_teknisi'),
                'nama_teknisi'  => $this->input->post('nama_teknisi'),
                'sektor'        => $this->input->post('sektor'),
                'jenis'         => $this->input->post('jenis'),
                'status'        => $this->input->post('status')
            ];

            $update = $this->userteknisi->updateByNik($nik_teknisi, $data);

            if ($update) {
                $this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
            } else {
                $this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
            }

            redirect('userteknisi');
        }
    }
}
// End of file Userteknisi.php