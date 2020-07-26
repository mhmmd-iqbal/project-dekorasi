<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> <?= $tittle ?> </title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <?= $this->include('main/main-css') ?>
</head>

<body>

    <?= $this->include('main/main-navbar') ?>

    <?= $this->renderSection('jumbotron') ?>

    <?= $this->renderSection('konten') ?>
    <?= $this->include('main/main-footer') ?>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

<div class="modal fade" id="modal-login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Login User</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-login">
                    <?= csrf_field() ?>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" placeholder="Username..." name="username" class="form-control" id="login-username" autocomplete="off">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="password" placeholder="Password..." name="password" class="form-control" id="login-password" autocomplete="off">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="button-login-submit" class="btn btn-sm btn-primary"><i id="fa-login-submit" class="fa fa-refresh fa-spin" hidden></i> <i id="fa-login-logo" class="fa fa-lock"></i> Masuk</button>
                <button type="button" id="button-login-cancel" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                <div style="font-size:10px" class="py-2">
                    Belum punya akun? Silahkan hubungi <a href="/contact">Admin <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
<?= $this->include('main/main-script') ?>