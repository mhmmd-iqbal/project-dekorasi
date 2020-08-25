<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $tittle ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/main/css/style.css" type="text/css">
    <style>
        .hero__categories__all {
            background: #b22222;
            position: relative;
            padding: 10px 25px 10px 40px;
            cursor: pointer;
        }

        .site-btn {
            font-size: 14px;
            color: #ffffff;
            font-weight: 800;
            text-transform: uppercase;
            display: inline-block;
            padding: 13px 30px 12px;
            background: #b22222;
            border: none;
        }

        .header__menu ul li.active a {
            color: #b22222;
        }

        .header__top {
            background: #fbfbfb;
        }

        .categories__item h5 a {
            font-size: 20px;
            color: #fbd0bd;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 4px;
            padding: 12px 0 10px;
            background: none;
            display: block;
            -webkit-text-stroke: 1px #b22222;
        }
    </style>
    <?= $this->renderSection('css') ?>
</head>