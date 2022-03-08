<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_produk');
        $this->load->model('m_transaksi');
        $this->load->model('m_chatting');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'produk' => $this->m_home->produk(),
            'best_deal_product' => $this->m_produk->best_deal_product(),
            'diskon' => $this->m_produk->diskon(),
            'daftar_chat' => $this->m_chatting->jml_chatting(),
            'best_deal_product_transaksi' => $this->m_produk->best_deal_product_transaksi(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => $kategori->nama_kategori,
            'produk' => $this->m_home->produk_all($id_kategori),
            'isi' => 'layout/frontend/kategori/v_kategori_produk'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }



    public function detail_produk($id_produk)
    {
        $data = array(
            'title' => 'Detail Produk',
            'gambar' => $this->m_home->gambar_produk($id_produk),
            'produk' => $this->m_home->detail_produk($id_produk),
            'related_products' => $this->m_home->related_products($id_produk),
            'reviews' => $this->m_home->reviews($id_produk),
            'isi' => 'layout/frontend/detail/v_detail_produk'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }
}
