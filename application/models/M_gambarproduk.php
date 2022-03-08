<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_gambarproduk extends CI_Model
{

    public function gambar()
    {
        $this->db->select('tbl_produk.*,COUNT(tbl_gambar.id_produk)as total_gambar');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_gambar', 'tbl_gambar.id_produk = tbl_produk.id_produk', 'left');
        $this->db->group_by('tbl_produk.id_produk');
        $this->db->order_by('tbl_produk.id_produk', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();
    }

    public function detail_gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_gambar', $data);
    }

    //Delete one item
    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tbl_gambar', $data);
    }
}
