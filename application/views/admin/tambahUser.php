<div class="container" style="background-color: #38D7E7;"> <br>
    <center>
        <h1>Registerasi User</h1>
    </center>
    <div class="row" style="padding:30px 5px 0px 75px;">
        <div class="col-9 mb-4">
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Telepon</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="telepon">
                        <small class="form-text text-danger"><?= form_error('telepon'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="alamat">
                        <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="email">
                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="password1">
                        <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Repeat Password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="password2">
                        <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="rolee" name="rolee">
                            <option disabled selected>Pilih Kategori</option>
                            <?php foreach ($akses as $r) : ?>
                                <option value="<?= $r ?>"><?= $r ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 mt-4">
                        <button type="submit" class="btn btn-primary">Tambah User</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-3">
            <img src="<?= base_url('assets/img/profile/') ?>default.jpg" style="background-color:white;" width="150">
        </div>

    </div>
</div>