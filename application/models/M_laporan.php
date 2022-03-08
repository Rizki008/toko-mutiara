<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order = tbl_rinci_transaksi.no_order', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_rinci_transaksi.id_produk', 'left');
        $this->db->where('DAY(tbl_transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order = tbl_rinci_transaksi.no_order', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_rinci_transaksi.id_produk', 'left');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_transaksi');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order = tbl_rinci_transaksi.no_order', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_rinci_transaksi.id_produk', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');

        return $this->db->get()->result();
    }

    public function lap_stock($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->where('DAY(tbl_transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $this->db->order_by('stock', 'desc');
        return $this->db->get()->result();
    }
}

/* End of file M_laporan.php */
