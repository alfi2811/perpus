<div class="container">
    <a href="<?= base_url('admin/tambahUser') ?>">
        <button class="btn btn-primary mb-3">
            <i class="fas fa-fw fa-plus pr-1"></i>
            Tambah User
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
                <th scope="col">Nama</th>
                <th scope="col">Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Tanggal Bergabung</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($userr as $m) : ?>
                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>
                    <td>
                        <?= $m['nama']; ?>
                    </td>
                    <td>
                        <?= $m['telepon']; ?>
                    </td>
                    <td>
                        <?= $m['alamat']; ?>
                    </td>
                    <td>
                        <?= $m['email']; ?>
                    </td>
                    <td>
                        <?= date('d F Y', $m['tgl_bergabung']); ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/ubahBuku/') . $m['id_user'] ?>" class="badge badge-success">ubah</a>
                        <a href="<?= base_url('admin/hapusBuku/') . $m['id_user'] ?>" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus')">Hapus</a>
                    </td>

                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>