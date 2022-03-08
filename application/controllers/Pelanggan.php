<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
        $this->load->model('m_chatting');
    }

    // List all your items
    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required|min_length[11]|max_length[13]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'min_length' => '%s Minimal 11 angka !!!',
            'max_length' => '%s Maksimal 13 angka !!!'
        ));
        $this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'is_unique' => '%s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('password', 'Password Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'matches' => '%s Password Tidak Sama !!!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Regiseter Pelanggan',
                'isi' => 'layout/frontend/register/v_register'
            );
            $this->load->view('layout/frontend/register/v_register');
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'no_telpon' => $this->input->post('no_telpon'),
                'jenis_kel' => $this->input->post('jenis_kel'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login!!!');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'layout/frontend/login/v_login_pelanggan'
        );
        $this->load->view('layout/frontend/login/v_login_pelanggan', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'isi' => 'layout/frontend/login/v_akun'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    //$this->pelanggan_login->proteksi_halaman();
    //$data = array(
    //'title' => 'Akun Saya',
    // 'isi' => 'layout/frontend/login/v_edit'
    //);
    //$this->load->view('layout/frontend/v_wrapper', $data, FALSE);

    public function edit($id_pelanggan = NULL)
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'is_unique' => '$s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Profil',
                    'pelanggan' => $this->m_pelanggan->detail($id_pelanggan),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/frontend/login/v_edit'
                );
                $this->load->view('layout/frontend/login/v_edit');
            } else {
                //hapus gambar di folder
                $pelanggan = $this->m_pelanggan->detail($id_pelanggan);
                if ($pelanggan->gambar !== "") {
                    unlink('./assets/gambar/' . $pelanggan->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_pelanggan' => $id_pelanggan,
                    'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                    'email' => $this->input->post('email'),
                    'no_telpon' => $this->input->post('no_telpon'),
                    'jenis_kel' => $this->input->post('jenis_kel'),
                    'alamat' => $this->input->post('alamat'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_pelanggan->edit($data);
                $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login!!!');
                redirect('pelanggan/akun');
            } //tanpa ganti gambar
            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'id_kategori' => $this->input->post('id_kategori'),
                'no_telpon' => $this->input->post('no_telpon'),
                'jenis_kel' => $this->input->post('jenis_kel'),
                'alamat' => $this->input->post('alamat'),
            );
            $this->m_pelanggan->edit($data);
            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login!!!');
            redirect('pelanggan/akun');
        }

        $data = array(
            'title' => 'Edit pelanggan',
            'pelanggan' => $this->m_pelanggan->detail($id_pelanggan),
            'isi' => 'layout/backend/pelanggan/v_edit'
        );
        $this->load->view('layout/frontend/login/v_edit');
    }
}

/* End of file Pelanggan.php */
