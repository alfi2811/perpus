<?php

class Buku_model extends CI_model
{
    public function getAllBuku()
    {
        $queryMenu = "select * from daftar_buku join `stok_buku` on `daftar_buku`.`kode_buku` = `stok_buku`.`judul_buku_id` 
        ";
        return $this->db->query($queryMenu)->result_array();
    }
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function tambahBuku()
    {
        $data = [
            'judul_buku' => htmlspecialchars($this->input->post('judul', true)),
            'pengarang' => htmlspecialchars($this->input->post('pengarang', true)),
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        ];
        $this->db->insert('daftar_buku', $data);
    }

    public function addUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'telepon' => htmlspecialchars($this->input->post('telepon', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => $this->input->post('password1', true),
            'tgl_bergabung' => time(),
            'role' => htmlspecialchars($this->input->post('rolee', true)),
        ];

        $this->db->insert('user', $data);
    }

    public function tambahStok($id_buku)
    {
        $id_bk = $id_buku;
        $data = [
            'judul_buku_id' => $id_bk,
            'nomor_rak' => htmlspecialchars($this->input->post('no_rak', true)),
            'jumlah_buku' => htmlspecialchars($this->input->post('stok', true)),
        ];
        $this->db->insert('stok_buku', $data);
    }

    public function getBukuByid($id)
    {
        return $this->db->get_where('daftar_buku', ['kode_buku' => $id])->row_array();
    }

    public function getStokByid($id)
    {
        return $this->db->get_where('stok_buku', ['judul_buku_id' => $id])->row_array();
    }

    public function ubahBuku()
    {
        $data = [
            'judul_buku' => htmlspecialchars($this->input->post('judul', true)),
            'pengarang' => htmlspecialchars($this->input->post('pengarang', true)),
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        ];
        $this->db->where('kode_buku', $this->input->post('id'));
        $this->db->update('daftar_buku', $data);
    }

    public function ubahStok($id)
    {
        $id_stok = $id;
        $data = [
            'judul_buku_id' => $id_stok,
            'nomor_rak' => htmlspecialchars($this->input->post('no_rak', true)),
            'jumlah_buku' => htmlspecialchars($this->input->post('stok', true)),
        ];
        $this->db->where('id_stok', $this->input->post('id_stk'));
        $this->db->update('stok_buku', $data);
    }

    public function cariDataPeminjamanByUser($id)
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_peminjam');
        $this->db->like('tgl_pinjam', $keyword);
        $this->db->or_like('tgl_kembali', $keyword);
        $this->db->or_like('denda', $keyword);
        $this->db->or_like('status_peminjaman', $keyword);
        $this->db->where('peminjaman.id_peminjam', $id);
        return $this->db->get()->result_array();
    }

    public function cariDataBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->select('*');
        $this->db->from('daftar_buku');
        $this->db->join('stok_buku', 'stok_buku.judul_buku_id=daftar_buku.kode_buku');
        $this->db->like('judul_buku', $keyword);
        $this->db->or_like('pengarang', $keyword);
        $this->db->or_like('kategori', $keyword);
        return $this->db->get()->result_array();
    }

    public function getBukuB($id_buku)
    {
        $id = $id_buku;
        $this->db->select('*');
        $this->db->from('daftar_buku');
        $this->db->join('peminjaman_detail', 'peminjaman_detail.buku_id=daftar_buku.kode_buku');
        $this->db->where('peminjaman_detail.peminjaman_id', $id);
        return $this->db->get()->result_array();
    }
    public function getPeminjamanB($id_buku)
    {
        $id = $id_buku;
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->where('peminjaman.id_p', $id);
        return $this->db->get()->row_array();
    }

    public function getAllPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_peminjam');
        return $this->db->get()->result_array();
    }

    public function getAllPeminjamanByUser($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_peminjam');
        $this->db->where('peminjaman.id_peminjam', $id);
        return $this->db->get()->result_array();
    }

    public function getDetailPeminjaman($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman_detail');
        $this->db->join('peminjaman', 'peminjaman.id_p=peminjaman_detail.peminjaman_id');
        $this->db->join('daftar_buku', 'daftar_buku.kode_buku=peminjaman_detail.buku_id');
        $this->db->where('peminjaman_detail.peminjaman_id', $id);
        return $this->db->get()->result_array();
    }
    public function getDetailUser($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_peminjam');
        $this->db->where('peminjaman.id_p', $id);
        return $this->db->get()->row_array();
    }

    public function ubahStatus_p($id)
    {

        $gg = $this->Buku_model->getPeminjamanB($id);
        $ambil = $gg['tgl_kembali'];
        $uu = '2019-04-20';
        $waktuu = time();
        $ambil2 = date('Y-m-d', $waktuu);
        if (strtotime($uu) > strtotime($ambil)) {
            $selisih = strtotime($uu) - strtotime($ambil);
            $hari = $selisih / (60 * 60 * 24);
            $dendak = 5000 * $hari;
            echo $dendak;
            $waktu = date('Y-m-d');
            $data = [
                'status_peminjaman' => 'Dikembalikan',
                'tgl_kembali' => $uu,
                'denda' => $dendak
            ];
            $this->db->where('id_p', $id);
            $this->db->update('peminjaman', $data);
        } else {
            $waktu = date('Y-m-d');
            $data = [
                'status_peminjaman' => 'Dikembalikan',
                'tgl_kembali' => $waktu
            ];
            $this->db->where('id_p', $id);
            $this->db->update('peminjaman', $data);
        }
    }
}
