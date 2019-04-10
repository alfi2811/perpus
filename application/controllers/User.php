<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            $this->load->view('templates/header', $data);
            $this->load->view('user/index');
            $this->load->view('templates/auth_footer');
        } else {
            redirect('auth');
        }
    }

    public function peminjaman()
    {
        $data['title'] = 'PEMINJAMAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['waktu'] = time();
        $data['buku'] = $this->Buku_model->getAllBuku();
        if ($this->input->post('keyword')) {
            $data['buku'] = $this->Buku_model->cariDataBuku();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('user/peminjaman');
        $this->load->view('templates/auth_footer');
    }

    public function tambahBukuCrt($id)
    {
        $id_buku = $id;
        if (isset($_SESSION['keranjang'][$id_buku])) {
            $_SESSION['keranjang'][$id_buku] += 1;
        } else {
            $_SESSION['keranjang'][$id_buku] = 1;
        }
        $this->session->set_flashdata('tambah', '<div class="alert alert-success" role="alert"> Produk Berhasil DiTambahkan! </div> ');
        redirect('user/peminjaman');
    }

    public function checkout()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $almt_user = $data['user']['alamat'];
        $waktu = time();
        $w_pinjam = date('Y-m-d', $waktu);
        $kembalian =  10080 * 60;
        $kembali = date('Y-m-d', strtotime('+7 days'), strtotime($w_pinjam));
        $w_kembali = $waktu + $kembalian;
        $data = [
            'id_peminjam' => $id_user,
            'alamat_peminjam' => $almt_user,
            'tgl_pinjam' => time(),
            'tgl_kembali' => $w_kembali,
            'denda' => '',
            'status_peminjaman' => 'Dipinjam'
        ];
        $this->db->insert('peminjaman', $data);
        $id_peminjaman = $this->db->insert_id();
        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
            $data = [
                'peminjaman_id' => $id_peminjaman,
                'buku_id' => $id_produk,
                'jumlah' => $jumlah
            ];
            $this->db->insert('peminjaman_detail', $data);

            $item = $this->db->get_where('stok_buku', ['judul_buku_id' => $id_produk])->row_array();

            $stock = $item['jumlah_buku'] - $jumlah;
            $data = array(
                'jumlah_buku' => $stock
            );
            $this->db->where('judul_buku_id', $id_produk);
            $this->db->update('stok_buku', $data);
        }
        $this->session->unset_userdata('keranjang');
        redirect('user/nota/' . $id_peminjaman);
    }

    public function nota($id)
    {
        $id_buku = $id;
        $data['title'] = 'Nota Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->Buku_model->getBukuB($id_buku);
        $data['peminjaman'] = $this->Buku_model->getPeminjamanB($id_buku);
        $this->load->view('templates/header', $data);
        $this->load->view('user/nota', $data);
        $this->load->view('templates/auth_footer');
    }

    public function riwayat()
    {
        $data['title'] = "Riwayat Peminjaman";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_u = $data['user']['id_user'];
        $data['peminjam'] = $this->Buku_model->getAllPeminjamanByUser($id_u);
        if ($this->input->post('keyword')) {
            $data['peminjam'] = $this->Buku_model->cariDataPeminjamanByUser($id_u);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('user/riwayatPeminjam', $data);
        $this->load->view('templates/auth_footer');
    }
}
