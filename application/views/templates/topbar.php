<div class="row">
    <div class="col-3">
        <nav class="navbar navbar-light bg-light brandd">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('assets/img/brand/') ?>logoTS.png" class="card-img">
                </a>
            </div>
        </nav>
    </div>
    <div class="col-9">

        <div>
            <div class="float-right mr-4 mt-4">
                <a href="#" role="button" style="text-decoration:none;" id="dropdownMenuLink" data-toggle="dropdown">
                    <span class="pr-2" style="color:black;"><?= $user['nama'] ?></span>
                    <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="card-img profile_img">
                </a>
                <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('admin') ?>">My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>