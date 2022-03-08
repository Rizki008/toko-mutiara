<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_transaksi', $data);
        $this->db->join('tbl_lokasi', 'tbl_transaksi.id_lokasi = table.id_lokasi', 'left');
    }

    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('tbl_rinci_transaksi', $data_rinci);
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function batalpesan()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=4');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        return $this->db->get()->result();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }

    public function produk()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }

    //detail pesanan selesai
    public function pesanan_detail($no_order)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_rinci_transaksi', 'tbl_transaksi.no_order = tbl_rinci_transaksi.no_order', 'left');
        $this->db->join('tbl_produk', 'tbl_rinci_transaksi.id_produk = tbl_produk.id_produk', 'left');
        $this->db->where('tbl_transaksi.no_order', $no_order);
        return $this->db->get()->result();
    }

    public function insert_riview()
    {
        $data = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'id_produk' => $this->input->post('id_produk'),
            'nama_pelanggan' => $this->session->userdata('nama_pelanggan'),
            'tanggal' => date('Y-m-d'),
            'isi' => $this->input->post('isi'),
        );
        $this->db->insert('tbl_riview', $data);
    }

    public function info($no_order)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('no_order', $no_order);
        return $this->db->get()->result();
    }
    //and pesanan selesai

    //grafik
    public function grafik()
    {
        $this->db->select_sum('qty');
        $this->db->select('tbl_produk.nama_produk');
        //$this->db->select('tbl_rinci_transaksi.qty');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_produk', 'tbl_rinci_transaksi.id_produk = tbl_produk.id_produk', 'left');
        $this->db->group_by('tbl_rinci_transaksi.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
}
