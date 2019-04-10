<div class="container" style="background-color: #38D7E7;"> <br>
    <center>
        <h1>Tambah Buku</h1>
    </center>
    <div class="row" style="padding:30px 5px 0px 75px;">
        <div class="col-9 mb-4">
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Judul Buku</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="judul">
                        <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pengarang</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="pengarang">
                        <small class="form-text text-danger"><?= form_error('pengarang'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor Rak</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no_rak">
                        <small class="form-text text-danger"><?= form_error('no_rak'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="stok">
                        <small class="form-text text-danger"><?= form_error('stok'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="kategori" name="kategori">
                            <option disabled selected>Pilih Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k ?>"><?= $k ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 mt-4">
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-3">
            <img src="<?= base_url('assets/img/profile/') ?>default.jpg" style="background-color:white;" width="150">
        </div>

    </div>
</div>