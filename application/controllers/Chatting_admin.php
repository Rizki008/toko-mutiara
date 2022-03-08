<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chatting_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_dashboard');
        $this->load->model('m_chatting');
        $this->load->model('m_admin');
        // $this->load->library('session');
    }

    public function pesan($id_pelanggan)
    {
        $this->form_validation->set_rules('pesan', 'Pesan', 'required', array(
            'pesan' => ' %s pesan harus diisi!!!'
        ));

        $data = array(
            'title' => 'Pesan Masuk',
            // 'jumlah' => $this->m_dasboard->hitungJumlahAsset(),
            // 'tampil_chat' => $this->m_chatting->chatting_tampil(),
            'pesan' => $this->m_chatting->pesan($id_pelanggan),
            'isi' => 'layout/backend/chatting/v_chatting'
        );
        $this->load->view('layout/backend/v_wrapper.php', $data, FALSE);
    }

    public function send()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'admin_send' => $this->input->post('pesan'),
            'pelanggan_send' => '0'
        );
        $this->db->insert('tbl_chatting', $data);
        redirect('chatting_admin/pesan/' . $data['id_pelanggan']);
    }

    // public function chat($id_pelanggan)
    // {
    //     $session = $this->session->userdata('id_user');
    //     $data = array(
    //         'title' => 'Chatting',
    //         'chatting' => $this->m_chatting->select_chat($id_pelanggan, $session, 1),
    //         'isi' => 'layout/backend/chatting/v_chatting'
    //     );
    //     $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    // }

    // public function send_mgs_chat($pelanggan_send = NULL)
    // {
    //     $isi = $this->input->post('msg');
    //     $data = array(
    //         'admin_send' => $isi,
    //         'id_admin' => $this->session->userdata('id_user'),
    //         'id_pelanggan' => $this->input->post('id_pelanggan'),
    //         'pelanggan_send' => $pelanggan_send
    //     );
    //     $this->db->insert('tbl_chatting', $data);
    //     $insert_id = $this->db->insert_id();

    //     $this->db->where(array('tbl_chatting.id_chatting' => $insert_id));
    //     $this->db->join('tbl_user', 'tbl_chatting.id_user = tbl_user.id_user', 'left');
    //     $msg = $this->db->get('tbl_chatting')->row();

    //     header('Content-Type: application/json');
    //     echo json_encode($msg);
    // }

}
