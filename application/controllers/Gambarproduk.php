<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambarproduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarproduk');
        $this->load->model('m_produk');
        $this->load->model('m_chatting');
    }

    public function index()
    {
        $data = array(
            'title' => 'Gambar Produk',
            'gambarproduk' => $this->m_gambarproduk->gambar(),
            'isi' => 'layout/backend/gambarproduk/v_gambarproduk'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function add($id_produk)
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambarproduk';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Gambar Produk',
                    'error_upload' => $this->upload->display_errors(),
                    'produk' => $this->m_produk->detail($id_produk),
                    'gambar' => $this->m_gambarproduk->detail_gambar($id_produk),
                    'isi' => 'layout/backend/gambarproduk/v_add'
                );
                $this->load->view('layout/backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarproduk' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_produk' => $id_produk,
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_gambarproduk->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('gambarproduk/add/' . $id_produk);
            }
        }
        $data = array(
            'title' => 'Tambah Gambar Produk',
            'produk' => $this->m_produk->detail($id_produk),
            'gambar' => $this->m_gambarproduk->detail_gambar($id_produk),
            'isi' => 'layout/backend/gambarproduk/v_add'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }


    public function delete($id_produk, $id_gambar)
    {
        //hapus gambar
        $gambar = $this->m_gambarproduk->detail($id_gambar);
        if ($gambar->gambar !== "") {
            unlink('./assets/gambarproduk/' . $gambar->gambar);
        }

        $data = array(
            'id_gambar' => $id_gambar
        );
        $this->m_gambarproduk->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus');
        redirect('gambarproduk/add/' . $id_produk);
    }
}
