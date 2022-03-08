<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi');
        $this->load->model('m_produk');

        $this->load->model('m_dashboard');
        $this->load->model('m_chatting');
        $this->load->library('session');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_produk' => $this->m_admin->total_produk(),
            'total_pesanan' => $this->m_admin->total_pesanan(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'total_transaksi' => $this->m_admin->total_transaksi(),
            'data_stock' => $this->m_admin->data_stock(),
            'grafik' => $this->m_transaksi->grafik(),
            'status_transaksi' => $this->m_admin->status_transaksi(),
            'produk' => $this->m_produk->produk(),
            'jumlah' => $this->m_dashboard->hitungJumlahAsset(),
            'daftar_chat' => $this->m_chatting->jml_chatting(),
            'isi' => 'v_admin'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function setting()
    {
        $this->form_validation->set_rules('nama_toko', 'Nama Pembeli', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('kota', 'Kota Pembeli', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('alamat', 'Alamat Pembeli', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('no_telpon', 'Nomer Pembeli', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting Lokasi Toko',
                'setting' => $this->m_admin->data_setting(),
                'isi' => 'layout/backend/setting/v_setting'
            );
            $this->load->view('layout/backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat' => $this->input->post('alamat'),
                'no_telpon' => $this->input->post('no_telpon'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Setting Berhasil Diedit!!!');
            redirect('admin/setting');
        }
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Konfirmasi Transaksi',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'pesanan_dibatalkan' => $this->m_pesanan_masuk->pesanan_dibatalkan(),
            'isi' => 'layout/backend/transaksi/v_transaksi'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 1
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        redirect('admin/pesanan_masuk');
    }

    public function batal($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'catatan' => $this->input->post('catatan'),
            'status_order' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'nama_pengirim' => $this->input->post('nama_pengirim'),
            'status_order' => 2
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di kirim');
        redirect('admin/pesanan_masuk');
    }

    public function detail($no_order)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
            'diproses_pesanan' => $this->m_pesanan_masuk->diproses_pesanan(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' =>  'layout/backend/transaksi/v_detail'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    // public function chat($id_pelanggan)
    // {
    //     $session = $this->session->userdata('id_user');
    //     $data = array(
    //         'title' => 'Chatting',
    //         'chatting' => $this->m_chatting->select_chat($id_pelanggan, $session, 1),
    //         'isi' => 'layout/backend/chatting/v_chatting'
    //     );
    //     $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    // }

    // public function send_mgs_chat($pelanggan_send = NULL)
    // {
    //     $isi = $this->input->post('msg');
    //     $data = array(
    //         'admin_send' => $isi,
    //         'id_admin' => $this->session->userdata('id_user'),
    //         'id_pelanggan' => $this->input->post('id_pelanggan'),
    //         'pelanggan_send' => $pelanggan_send
    //     );
    //     $this->db->insert('tbl_chatting', $data);
    //     $insert_id = $this->db->insert_id();

    //     $this->db->where(array('tbl_chatting.id_chatting' => $insert_id));
    //     $this->db->join('tbl_user', 'tbl_chatting.id_user = tbl_user.id_user', 'left');
    //     $msg = $this->db->get('tbl_chatting')->row();

    //     header('Content-Type: application/json');
    //     echo json_encode($msg);
    // }
}
