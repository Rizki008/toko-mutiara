<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_lokasi extends CI_Model
{

    public function lokasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_lokasi');
        $this->db->order_by('id_lokasi', 'desc');
        return $this->db->get()->result();
    }

    // Add a new item
    public function add($data)
    {
        $this->db->insert('tbl_lokasi', $data);
    }

    //Update one item
    public function edit($data)
    {
        $this->db->where('id_lokasi', $data['id_lokasi']);
        $this->db->update('tbl_lokasi', $data);
    }

    //Delete one item
    public function delete($data)
    {
        $this->db->where('id_lokasi', $data['id_lokasi']);
        $this->db->delete('tbl_lokasi', $data);
    }
}

/* End of file M_barang.php */
