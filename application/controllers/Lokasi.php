<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_lokasi');
        $this->load->model('m_admin');
        $this->load->model('m_dashboard');
        $this->load->model('m_chatting');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data lokasi',
            'lokasi' => $this->m_lokasi->lokasi(),
            'isi' => 'layout/backend/lokasi/v_lokasi',
        );
        $this->load->view('layout/backend/v_wrapper.php', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        $data = array(
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'ongkir' => $this->input->post('ongkir')
        );
        $this->m_lokasi->add($data);
        $this->session->set_flashdata('pesan', 'Lokasi Berhasil Ditambahkan!!!');
        redirect('lokasi');
    }

    public function edit($id_lokasi = NULL)
    {
        $data = array(
            'id_lokasi' => $id_lokasi,
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'ongkir' => $this->input->post('ongkir')
        );
        $this->m_lokasi->edit($data);
        $this->session->set_flashdata('pesan', 'Lokasi Berhasil Diedit!!!');
        redirect('lokasi');
    }

    //Delete one item
    public function delete($id_lokasi = NULL)
    {
        $data = array(
            'id_lokasi' => $id_lokasi
        );
        $this->m_lokasi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('lokasi');
    }
}

/* End of file Produk.php */
