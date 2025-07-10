<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userseqclose extends CI_Controller
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
        $this->load->model('M_Seqclose', 'seqclose');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $seqclose_data = $this->seqclose->searchSeqclose($keyword);
        } else {
            $seqclose_data = $this->seqclose->getAllSeqclose();
        }

        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Segment Close',
            'page' => 'userseqclose/v_userseqclose',
            'judul' => 'Data Segment Close',
            'seqclose' => $seqclose_data,
            'keyword' => $keyword,
            'user' => $this->db->get_where('user', ['email' => $email])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userseqclose/v_userseqclose', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $seqclose = $this->seqclose->getSeqcloseById($id);
        if (!$seqclose) {
            show_404();
        }

        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Edit Segment Close',
            'judul' => 'Edit Segment Close',
            'page' => 'userseqclose/v_editUserseqclose',
            'seqclose' => $seqclose,
            'user' => $this->db->get_where('user', ['email' => $email])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userseqclose/v_editUserseqclose', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required', [
            'required' => 'Segmentasi harus diisi!'
        ]);
        $this->form_validation->set_rules('sub_segment', 'Sub Segment', 'required', [
            'required' => 'Sub Segment harus diisi!'
        ]);

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'segmentasi' => $this->input->post('segmentasi'),
                'sub_segment' => $this->input->post('sub_segment')
            ];

            $update = $this->seqclose->updateSeqclose($id, $data);

            if ($update) {
                $this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
            } else {
                $this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
            }

            redirect('userseqclose');
        }
    }
}
