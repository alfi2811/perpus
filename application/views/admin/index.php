<!-- Begin Page Content -->
<div class="container-fluid">

    <h1><?= $title; ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <p class="card-text"><small class="text-muted">User Since <?= date('d F Y ', $user['tgl_bergabung']) ?></small></p>

                </div>
            </div>
        </div>
    </div>

</div>

</div>