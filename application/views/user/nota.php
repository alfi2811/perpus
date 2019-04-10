<div class="container mt-5 ">
    <h2>DETAIL PEMBELIAN</h2>

    <div class="row mt-3">

        <div class="col-md-5 ">
            <h3>Pelanggan</h3>
            <strong><?php echo $user['nama']; ?></strong> <br>
            <p>
                <?php echo $user['telepon']; ?><br>
                <?php echo $user['email']; ?>
            </p>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5">
            <h3>Peminjaman</h3>
            <?php
            $dataa = strtotime($peminjaman['tgl_kembali']);
            $dataa1 = strtotime($peminjaman['tgl_pinjam']);
            ?>
            Dari: <strong><?= date('d F Y', $dataa) ?><br></strong>
            Sampai: <strong><?= date('d F Y', $dataa1) ?> <br></strong>
            Alamat : <?php echo $peminjaman['alamat_peminjam']; ?>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No. </th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah</th>
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
                        <?= $m['jumlah']; ?>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-7 mt-3">
            <div class="alert alert-info">
                <h6>
                    Mohon Kembalikan Sesuai Ketentuan Tanggal Yang Berlaku, Jika Tidak, Akan Dikenakan Biaya Sebesar <strong>Rp. 5000</strong>
                </h6>
            </div>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-3 mt-3">
            <a href="<?= base_url('user') ?>" class=" btn btn-info btn-block float-right">Selesai</a>
        </div>

    </div>
</div>