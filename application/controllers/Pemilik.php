<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi');
        $this->load->model('m_produk');
        $this->load->model('m_laporan');

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
            'status_transaksi_selesai' => $this->m_admin->status_transaksi_selesai(),
            'produk' => $this->m_produk->produk(),
            'jumlah' => $this->m_dashboard->hitungJumlahAsset(),
            'tampil_chat' => $this->m_chatting->chatting_tampil(),
            'isi' => 'v_pemilik'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }

    public function laporan()
    {
        $data = array(
            'title' => 'Laporan',
            'isi' => 'layout/pemilik/laporan/v_laporan'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }

    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'isi' => 'layout/pemilik/laporan/v_lap_harian'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }

    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
            'isi' => 'layout/pemilik/laporan/v_lap_bulanan'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }

    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
            'isi' => 'layout/pemilik/laporan/v_lap_tahunan'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }

    public function lap_stock()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Stock Barang',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'isi' => 'layout/pemilik/laporan/v_lap_stock'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }
}
