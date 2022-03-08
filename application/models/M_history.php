<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{
    public function history()
    {
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left');
        return $this->db->get('tbl_produk')->result();
    }
}
