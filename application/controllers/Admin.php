<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Buku_model');
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (isset($data['user'])) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function daftarUser()
    {
        $data['title'] = "Daftar Buku";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->Buku_model->getAllUser();
        if ($this->input->post('keyword')) {
            $data['userr'] = $this->Buku_model->cariDataUser();
        }

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/daftarUser');
        $this->load->view('templates/footer');
    }

    public function daftarBuku()
    {
        $data['title'] = "Daftar Buku";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->Buku_model->getAllBuku();
        if ($this->input->post('keyword')) {
            $data['buku'] = $this->Buku_model->cariDataBuku();
        }

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/daftarBuku');
        $this->load->view('templates/footer');
    }

    public function tambahBuku()
    {
        $this->form_validation->set_rules('judul', 'Title', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Writer', 'required|trim');
        $this->form_validation->set_rules('no_rak', 'Rak', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Buku";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kategori'] = [
                'Mata Pelajaran',
                'Kabel',
                'Sejarah',
                'Novel',
                'Programming'
            ];
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahBuku');
            $this->load->view('templates/footer');
        } else {
            $this->Buku_model->tambahBuku();
            $id_buku = $this->db->insert_id();
            $this->Buku_model->tambahStok($id_buku);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Selamat Buku Telah Ditambahkan </div> ');
            redirect('admin/daftarBuku');
        }
    }

    public function tambahUser()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('telepon', 'Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'min_length' => 'Password too short!',
            'matches' => 'Password not match!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Registration';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['akses'] = [
                'Super Admin',
                'User'
            ];
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/registration');
            $this->load->view('templates/footer');
        } else {

            $this->Buku_model->addUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation you have an account </div> ');
            redirect('admin');
        }
    }

    public function ubahBuku($id)
    {
        $this->form_validation->set_rules('judul', 'Title', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Writer', 'required|trim');
        $this->form_validation->set_rules('no_rak', 'Rak', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Ubah Buku";
            $data['buku'] = $this->Buku_model->getBukuById($id);
            $data['stok'] = $this->Buku_model->getStokById($id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kategori'] = [
                'Mata Pelajaran',
                'Kabel',
                'Sejarah',
                'Novel',
                'Programming'
            ];
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/ubahBuku', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Buku_model->ubahBuku();
            $this->Buku_model->ubahStok($id);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Selamat Buku Telah Diubah </div> ');
            redirect('admin/daftarBuku');
        }
    }

    public function hapusBuku($id)
    {
        $this->db->delete('daftar_buku', ['kode_buku' => $id]);
        $this->db->delete('stok_buku', ['jumlah_buku_id' => $id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Selamat Data Buku Telah Dihapus </div> ');
        redirect('admin/daftarBuku');
    }

    public function listPeminjaman()
    {
        $data['title'] = "Daftar Buku";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peminjam'] = $this->Buku_model->getAllPeminjaman();
        if ($this->input->post('keyword')) {
            $data['peminjam'] = $this->Buku_model->cariDataBuku();
        }

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/daftarpeminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function detailPeminjaman($id)
    {
        $id_peminjaman = $id;
        $data['title'] = "Daftar Buku";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['detail'] = $this->Buku_model->getDetailPeminjaman($id_peminjaman);
        $data['peminjam'] = $this->Buku_model->getDetailUser($id_peminjaman);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detailPeminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function ubahStatus($id)
    {
        $this->Buku_model->ubahStatus_p($id);
        $this->session->set_flashdata('psn', '<div class="alert alert-success" role="alert"> Buku Telah DiKembalikan </div> ');
        redirect('admin/listPeminjaman');


        // $this->Buku_model->ubahStatus_p($id);
        // $this->session->set_flashdata('psn', '<div class="alert alert-success" role="alert"> Buku Telah DiKembalikan </div> ');
        // redirect('admin/listPeminjaman');
    }
}
