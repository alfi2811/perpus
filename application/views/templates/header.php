<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="<?= base_url('assets/') ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/kasir.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding:20px; box-shadow: 1px 1px 6px 1px;">
        <div class="container">
            <a class="navbar-brand" href="#">TEL-Perpus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/peminjaman'); ?> ">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/riwayat'); ?> ">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?> ">About</a>
                    </li>
                </div>
            </div>
        </div>


        <div class="nav-item mr-3">
            <a href="#" role="button" style="text-decoration:none;" id="dropdownMenuLink" data-toggle="dropdown">
                <span class="pr-2" style="color:black;"><?= $user['nama'] ?></span>
                <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="card-img profile_img">
            </a>
            <div class="dropdown-menu dropdown-menu-right mr-2" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url('user') ?>">My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>