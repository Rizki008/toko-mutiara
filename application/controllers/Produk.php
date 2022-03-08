<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_admin');
        $this->load->model('m_dashboard');
        $this->load->model('m_chatting');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data produk',
            'produk' => $this->m_produk->produk(),
            'isi' => 'layout/backend/produk/v_produk',

        );
        $this->load->view('layout/backend/v_wrapper.php', $data, FALSE);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['pencarian'] = $this->m_produk->pencarian($keyword);
        $this->load->view('layout/backend/v_wrapper.php', $data);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('berat', 'Berat Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('product_unit', 'Produk Satuan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('stock', 'stock Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Produk',
                    'kategori' => $this->m_kategori->kategori(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/backend/produk/v_add'
                );
                $this->load->view('layout/backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'product_unit' => $this->input->post('product_unit'),
                    'stock' => $this->input->post('stock'),
                    'diskon' => $this->input->post('diskon'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_produk->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('produk');
            }
        }

        $data = array(
            'title' => 'Tambah Produk',
            'kategori' => $this->m_kategori->kategori(),
            'isi' => 'layout/backend/produk/v_add'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    //Edit one item
    public function edit($id_produk = NULL)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('berat', 'Berat Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('product_unit', 'Satuan Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('stock', 'stock Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Produk',
                    'kategori' => $this->m_kategori->kategori(),
                    'produk' => $this->m_produk->detail($id_produk),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/backend/produk/v_edit'
                );
                $this->load->view('layout/backend/v_wrapper', $data, FALSE);
            } else {
                //hapus gambar di folder
                $produk = $this->m_produk->detail($id_produk);
                if ($produk->gambar !== "") {
                    unlink('./assets/gambar/' . $produk->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_produk' => $id_produk,
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'product_unit' => $this->input->post('product_unit'),
                    'stock' => $this->input->post('stock'),
                    'diskon' => $this->input->post('diskon'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_produk->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('produk');
            } //tanpa ganti gambar
            $data = array(
                'id_produk' => $id_produk,
                'nama_produk' => $this->input->post('nama_produk'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'product_unit' => $this->input->post('product_unit'),
                'stock' => $this->input->post('stock'),
                'diskon' => $this->input->post('diskon'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->m_produk->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('produk');
        }

        $data = array(
            'title' => 'Edit Produk',
            'kategori' => $this->m_kategori->kategori(),
            'produk' => $this->m_produk->detail($id_produk),
            'isi' => 'layout/backend/produk/v_edit'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($id_produk = NULL)
    {
        //hapus gambar
        $produk = $this->m_produk->detail($id_produk);
        if ($produk->gambar !== "") {
            unlink('./assets/gambar/' . $produk->gambar);
        }

        $data = array(
            'id_produk' => $id_produk
        );
        $this->m_produk->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('produk');
    }
}

/* End of file Produk.php */
