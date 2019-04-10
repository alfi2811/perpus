<div class="container mt-5">
    <h4>DETAIL PEMINJAMAN</h4>
    <table>
        <tr>
            <td>Nama Lengkap &nbsp;</td>
            <td>:&nbsp; <?= $peminjam['nama'] ?> </td>
        </tr>
        <tr>
            <td>Alamat &nbsp;</td>
            <td>:&nbsp; <?= $peminjam['alamat'] ?> </td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No. </th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Denda</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($detail as $m) : ?>
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
                    <td>
                        <?= date('d F Y', $m['tgl_pinjam']); ?>
                    </td>
                    <td>
                        <?= date('d F Y', $m['tgl_kembali']); ?>
                    </td>
                    <td>
                        <?= $m['denda']; ?>
                    </td>
                    <td>
                        <?= $m['status_peminjaman']; ?>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>