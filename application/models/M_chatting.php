<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_chatting extends CI_Model
{

    public function select_chat()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('tbl_chatting');
        $this->db->join('tbl_pelanggan', 'tbl_chatting.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->where('tbl_chatting.id_pelanggan=', $id_pelanggan);
        return $this->db->get()->result();
    }

    public function daftar_chat()
    {
        $this->db->select('*');
        $this->db->from('tbl_chatting');
        $this->db->join('tbl_pelanggan', 'tbl_chatting.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->group_by('tbl_chatting.id_pelanggan');
        return $this->db->get()->result();
    }

    public function pesan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tbl_chatting');
        $this->db->join('tbl_pelanggan', 'tbl_chatting.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->where('tbl_chatting.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }

    public function jml_chatting()
    {
        $this->db->select('*');
        $this->db->from('tbl_chatting');
        $this->db->group_by('id_pelanggan');
        return $this->db->get()->num_rows();
    }

    // public function select_chat($id_pelanggan)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_chatting');
    //     $this->db->join('tbl_pelanggan', 'tbl_chatting.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
    //     $this->db->join('tbl_user', 'tbl_chatting.id_user = tbl_chatting.id_user', 'left');
    //     $this->db->where('tbl_chatting.id_pelanggan', $id_pelanggan);
    //     $chat['list_chat'] = $this->db->get()->result();
    //     return $chat;
    // }

    // public function chatting_tampil()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_chatting');
    //     $this->db->join('tbl_pelanggan', 'tbl_chatting.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
    //     $this->db->where('tbl_chatting.id_pelanggan IS NOT NULL');
    //     $this->db->group_by('tbl_chatting.id_pelanggan');
    //     return $this->db->get()->result();
    // }

}
