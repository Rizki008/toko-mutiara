<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pencarian extends CI_Model
{

    public function ambil_data($data = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        if (!empty($data)) {
            $this->db->like('nama_produk', $data);
        }
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get()->result();
    }
}
