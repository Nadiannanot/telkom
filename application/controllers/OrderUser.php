<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('M_Order', 'order');
    }

    // Monitoring order (lihat & search)
    public function index()
    {
        $q = $this->input->get('q');
        if ($q) {
            $order = $this->order->searchOrder($q);
        } else {
            $order = $this->order->getAllOrder();
        }
        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Monitoring Order',
            'order' => $order,
            'user'  => $this->db->get_where('user', ['email' => $email])->row_array()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('orderuser/v_order_user', $data);
        $this->load->view('templates/footer');
    }

    // Edit order
    public function edit($id)
    {
        $order = $this->order->getOrderById($id);
        if (!$order) {
            show_404();
        }
        $email = $this->session->userdata('email');
        $data = [
            'title' => 'Edit Order',
            'order' => $order,
            'user'  => $this->db->get_where('user', ['email' => $email])->row_array()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('orderuser/v_editorder_user', $data);
        $this->load->view('templates/footer');
    }

    // Proses update order
    public function update()
    {
        $id = $this->input->post('id');
        $order = $this->order->getOrderById($id);
        if (!$order) {
            show_404();
        }
        $data = [
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
        $this->session->set_flashdata('toastr-success', 'Order berhasil diupdate.');
        redirect('orderuser');
    }
}
