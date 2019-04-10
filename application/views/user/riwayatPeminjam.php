<div class="container mt-5">

    <div class="row mb-3">
        <div class="col-6">
            <form action="" method="post">
                <div class="input-group mb-2">
                    <input type="text" class="form-control mr-3" placeholder="Cari Buku..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?= $this->session->flashdata('psn'); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No. </th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Denda</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;

            ?>
            <?php foreach ($peminjam as $m) : ?>
                <?php
                $dataa = strtotime($m['tgl_kembali']);
                $dataa1 = strtotime($m['tgl_pinjam']);
                ?>
                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>
                    <td>
                        <?= date('d F Y', $dataa1); ?>
                    </td>
                    <td>
                        <?= date('d F Y', $dataa) ?>
                    </td>
                    <td>
                        <?= $m['denda']; ?>
                    </td>
                    <td>
                        <?= $m['status_peminjaman']; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('user/nota/') . $m['id_p'] ?>" class="btn btn-info">Detail</a>
                    </td>

                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>