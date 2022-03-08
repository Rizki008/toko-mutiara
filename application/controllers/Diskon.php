<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Diskon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_admin');
        $this->load->model('m_dashboard');
        $this->load->model('m_chatting');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data Diskon produk',
            'diskon' => $this->m_produk->data_diskon(),
            'isi' => 'layout/backend/diskon/v_diskon',

        );
        $this->load->view('layout/backend/v_wrapper.php', $data, FALSE);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['pencarian'] = $this->m_produk->pencarian($keyword);
        $this->load->view('layout/backend/v_wrapper.php', $data);
    }

    // Add a new item
    public function edit($id_produk = NULL)
    {
        $data = array(
            'id_produk' => $id_produk,
            'diskon' => $this->input->post('diskon')
        );
        $this->m_produk->edit($data);
        $this->session->set_flashdata('pesan', 'Kategori Berhasil Diedit!!!');
        redirect('diskon');
    }

    //Delete one item
    public function delete($id_produk = NULL)
    {
        //hapus gambar
        $produk = $this->m_produk->detail($id_produk);
        if ($produk->gambar !== "") {
            unlink('./assets/gambar/' . $produk->gambar);
        }

        $data = array(
            'id_produk' => $id_produk
        );
        $this->m_produk->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('produk');
    }
}

/* End of file Produk.php */
