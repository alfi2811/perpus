<div class="container">
    <a href="<?= base_url('admin/tambahBuku') ?>">
        <button class="btn btn-primary mb-3">
            <i class="fas fa-fw fa-plus pr-1"></i>
            Tambah Buku
        </button>
    </a>
    <?= $this->session->flashdata('msg'); ?>
    <div class="row mb-3">
        <div class="col-6">
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
                        <a href="<?= base_url('admin/ubahBuku/') . $m['kode_buku'] ?>" class="badge badge-success">ubah</a>
                        <a href="<?= base_url('admin/hapusBuku/') . $m['kode_buku'] ?>" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus')">Hapus</a>
                    </td>

                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>