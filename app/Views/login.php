<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Halaman Login User</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?= base_url() ?>/assets/template/main/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/main/login.css">
</head>


<body>

    <div class="login-block">
        <h1>
            <a href="/"> Informasi Jasa Dekorasi Aceh</a>
        </h1>
        <form action="/Login/SignIn" method="POST">
            <?= csrf_field() ?>
            <input type="text" value="" name="username" placeholder="Username" id="username" />
            <input type="password" name="password" value="" placeholder="Password" id="password" />
            <button type="submit"><i class="fa fa-sign-in"></i> Masuk</button>
            <?php if ($validation != null) : ?>
                <div class="alert alert-danger my-2">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>