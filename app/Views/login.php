<?= $this->extend('login/login-template') ?>
<?= $this->section('konten') ?>
<form class="login100-form validate-form" method="POST" action="/cms">
    <?php if ($error != NULL) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <small><?= $error ?></small>
        </div>
    <?php endif; ?>
    <span class="login100-form-title">
        Admin Login
    </span>

    <?= csrf_field(); ?>
    <div class="wrap-input100 " data-validate="Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="email" placeholder="Email" value="<?= old('email') ?>">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Username is required">
        <input class="input100" type="text" name="username" placeholder="Username" value="<?= old('username') ?>">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="password" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>

    <div class="container-login100-form-btn p-b-100">
        <button class="login100-form-btn">
            Login
        </button>
    </div>
</form>
<?= $this->endSection('konten') ?>