<div class="container-ku">
    <div class="row">
        <div class="col-6">
            <h3 class="gede">PEMINJAMAN BUKU: <?= $user['nama'] ?></h3>
        </div>
        <div class="col-2">

        </div>
        <div class="col-4">
            <table>
                <tr>
                    <td>
                        <h5>Daftar Belanja</h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table>
                <tr>
                    <td>Nama Kasir</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>
                        <?= $user['nama'] ?>
                    </td>
                </tr>
                <tr>
                    <td>ID Siswa</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>
                        <?= $user['id_user'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>
                        <?= date('d F Y', $waktu) ?>
                    </td>
                </tr>
            </table>
            <hr>
            <div class="col-6 mb-3">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control mr-3" placeholder="Cari Buku..." name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4">
            <?= $this->session->flashdata('tambah'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Qty</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :
                        $take = $this->db->get_where('daftar_buku', ['kode_buku' => $id_produk])->row_array();

                        ?>
                        <tr>
                            <td>
                                <a href="<?= base_url('user/hapusProduk/') . $id_produk ?>" style="text-decoration: none;">
                                    x</a>
                            </td>
                            <td><?= $take['judul_buku'] ?></td>
                            <td><?= $take['pengarang'] ?></td>
                            <td><?= $jumlah ?></td>

                        </tr>

                    <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No. </th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Nomor Rak</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($buku as $m) : ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $m['judul_buku']; ?>
                            </td>
                            <td>
                                <?= $m['pengarang']; ?>
                            </td>
                            <td>
                                <?= $m['kategori']; ?>
                            </td>
                            <td>
                                <?= $m['jumlah_buku']; ?>
                            </td>
                            <td>
                                <?= $m['nomor_rak']; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('user/tambahBukuCrt/') . $m['kode_buku'] ?>" class="badge badge-primary">Tambah</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <a href="<?= base_url('user/checkout') ?>" class="btn btn-success mt-2 btn-block">Pinjam</a>
        </div>
    </div>
</div>