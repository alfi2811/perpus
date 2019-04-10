<div style="background-color: #f18e5d; height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card mx-auto " style="margin-top: 170px; width: 28rem; background-color: #FCD783; color: white;">
                    <div>
                        <center>
                            <h1 class="mt-3">Login Admin</h1>
                        </center>
                        <div class="container mt-3">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <form class="mx-4 my-5" action="" method="post">
                            <div class="form-group mb-4">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                                <small class="form-text text-danger pl-3"><?= form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                <small class="form-text text-danger pl-3"><?= form_error('password'); ?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block float-right mb-3">Submit</button>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>