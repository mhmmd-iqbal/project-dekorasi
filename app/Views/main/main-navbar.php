<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-light"><a href="/"><span>JasaDekor</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="<?= base_url() ?>/assets/template/main/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>
                <li class="<?= $active == 'home' ? 'active' : '' ?> "><a href="/">Home</a></li>
                <li class="<?= $active == 'jasa' ? 'active' : '' ?> "><a href="/jasa">Jasa Dekorasi</a></li>
                <li class="<?= $active == 'contact' ? 'active' : '' ?> "><a href="/contact">Hubungi Kami</a></li>
                <!-- <li class="drop-down"><a href="">Drop Down</a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="drop-down"><a href="#">Drop Down 2</a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                        <li><a href="#">Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="/contact">Hubungi Kami</a></li> -->
                <li><a href="#" id="open-modal-login">Login</a></li>
                <!-- <li><a href='/login'>Login</a></li> -->
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->