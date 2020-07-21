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

    <?= $this->include('main/main-script') ?>
</body>

</html>