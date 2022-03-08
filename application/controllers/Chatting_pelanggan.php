<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chatting_pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chatting');
    }

    public function index()
    {
        $this->form_validation->set_rules('pesan', 'Pesan', 'required', array('pesan' => 'pesan harus diisi!!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Chatting',
                'chat' => $this->m_chatting->select_chat(),
                'isi' => 'layout/frontend/chatting/v_chatting'
            );
            $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'pelanggan_send' => $this->input->post('pesan'),
                'admin_send' => '0'
            );
            $this->db->insert('tbl_chatting', $data);
            redirect('chatting_pelanggan');
        }
    }
}
