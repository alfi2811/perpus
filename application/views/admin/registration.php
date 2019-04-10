<div style="background-color: #E7E5E4; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card" style=" width: 35rem;padding: 29px; background-color: #FCD783; color: white;">
                    <div>
                        <center>
                            <h1 class="mt-3">Registerasi Admin</h1>
                        </center>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="mx-4 mt-5" action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user mb-4" id="nama" name="nama" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                <!-- cara melihat kesalahan saat ngisi form -->
                                <small class="form-text text-danger pl-3"><?= form_error('nama'); ?> </small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user mb-4" id="telepon" name="telepon" placeholder="Telepon" value="<?= set_value('telepon'); ?>">
                                <?= form_error('telepon', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user mb-4" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user mb-4" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-row mb-4">
                                <div class="col">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="rolee" name="rolee">
                                    <option disabled selected>Pilih Kategori</option>
                                    <?php foreach ($akses as $r) : ?>
                                        <option value="<?= $r ?>"><?= $r ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user btn-block jrk-regis">
                            Register Account
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>