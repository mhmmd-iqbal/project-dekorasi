<?= $this->extend('dekoraceh/main-page') ?>
<?= $this->section('js') ?>
<script>
    $('.banner-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        center: true,
        autoWidth: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 5
            },
            1000: {
                items: 6
            }
        }
    })

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        center: true,
        autoWidth: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 5
            },
            1000: {
                items: 6
            }
        }
    })
</script>
<?= $this->endSection('js') ?>
<?= $this->section('css') ?>
<style>
    .category-img {
        height: 15vh;
        width: 15vh;
    }



    .category-img img {
        /* width: 100%; */
        object-fit: cover;
    }

    .category a {
        color: #ea5b22;
        font-size: 15px;
    }

    .category a:hover {
        /* transition: .8s ease; */
        font-weight: bold;
    }

    .bar-category:hover {
        color: #ea5b22;
    }

    .recent-product {
        display: flex;
        width: 100vmin;
    }

    .recent-product .product-box {
        height: 40vh;
        width: 40vh;
        padding: 5px;
        margin: 10px;
    }

    .recent-product .product-box img {
        object-fit: cover;
        width: 100%;
    }
</style>

<?= $this->endSection('css') ?>
<?= $this->section('konten') ?>
<!-- Hero Section Begin -->
<!-- <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Kategori</span>
                    </div>
                    <ul>
                        <?php foreach ($category as $d) : ?>
                            <li><a class="bar-category" href="/kategori/<?= $d->slug ?>"><?= $d->category_name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Cari Produk
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="<?= base_url() ?>/assets/img/bg2.jpg">
                    <div class="hero__text">
                        <h2 style="color: white;">JASA<br />DEKOR</h2>
                        <p style="color: white">Cari jasa dekorasi untuk Hajatan, Pesta, Akikah, dan lainnya di sini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Hero Section End -->
<div class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-height: 200vh;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="banner__pic">
                                <img src="<?= base_url() ?>/assets/main/img/banner/banner-1.jpg" style="width: 100%;" alt="">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="banner__pic">
                                <img src="<?= base_url() ?>/assets/main/img/banner/banner-2.jpg" style="width: 100%;" alt="">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Begin -->
<!-- <div class="banner featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url() ?>/assets/main/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url() ?>/assets/main/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner End -->

<!-- Categories Section Begin -->
<section class="categories pt-5">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="section-title from-blog__title">
                    <h2>Kategori</h2>
                </div>
            </div>
        </div> -->
        <div class="row col-md-12 col-sm-12 d-flex justify-content-center">
            <?php foreach ($category as $d) : ?>
                <div class="category text-center m-2">
                    <div class="tumbnail category-img">
                        <img src="<?= base_url() ?>/assets/cover/<?= $d->cover ?>" class="rounded float-left " alt="...">
                    </div>
                    <a href=""> <?= $d->category_name ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<!-- <section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-2.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-3.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-4.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-5.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-6.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-7.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= base_url() ?>/assets/main/img/featured/feature-8.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Featured Section End -->

<!-- Latest Product Section Begin -->
<section class="banner featured">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title from-blog__title">
                    <h2>Produk Terbaru</h2>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="owl-carousel" style="width: 100%; ">
                    <?php foreach ($lastest_product as $i => $d) : ?>
                        <div class="">
                            <div class="card" style="width: 20rem;">
                                <div style="object-fit: cover; height: 200px">
                                    <img class="card-img-top" style="height:200px; " src="<?= base_url() ?>/assets/product/<?= $d['product_image'] ?>" alt="">
                                </div>
                                <div class="card-body" style="height: 200px;">
                                    <h4 class="card-title" style="color: #ea5b22"><?= $d['product_name'] ?></h4>
                                    <p class="card-text"><?= $d['product_desc'] ?></p>
                                </div>
                                <div class="card-footer" style="height: 80px;">
                                    <div class="float-left">
                                        <?php if ($d['product_disc'] == 0) : ?>
                                            <div style="font-size: 20px;">Rp. <?= number_format($d['product_price'], 0, ",", ".") ?> </div>
                                        <?php else : ?>
                                            <div style="text-decoration: line-through">Rp. <?= number_format($d['product_price'], 0, ",", ".") ?> </div>
                                            <div style="font-size: 20px;">Rp. <?= number_format(($d['product_price'] - ($d['product_price'] * $d['product_disc'] / 100)), 0, ",", ".") ?> </div>
                                        <?php endif; ?>
                                    </div>
                                    <a href="#" class="btn btn-primary float-right">Cek Produk Ini</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<section class="banner featured">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title from-blog__title">
                    <h2>Produk Terlaris</h2>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="owl-carousel" style="width: 100%; ">
                    <?php foreach ($lastest_product as $i => $d) : ?>
                        <div class="">
                            <div class="card" style="width: 20rem;">
                                <div style="object-fit: cover; height: 200px">
                                    <img class="card-img-top" style="height:200px; " src="<?= base_url() ?>/assets/product/<?= $d['product_image'] ?>" alt="">
                                </div>
                                <div class="card-body" style="height: 200px;">
                                    <small class="float-right">127 <i class="fa fa-star"></i> </small>
                                    <h4 class="card-title" style="color: #ea5b22"><?= $d['product_name'] ?></h4>
                                    <p class="card-text"><?= $d['product_desc'] ?></p>
                                </div>
                                <div class="card-footer" style="height: 80px;">
                                    <div class="float-left">
                                        <?php if ($d['product_disc'] == 0) : ?>
                                            <div style="font-size: 20px;">Rp. <?= number_format($d['product_price'], 0, ",", ".") ?> </div>
                                        <?php else : ?>
                                            <div style="text-decoration: line-through">Rp. <?= number_format($d['product_price'], 0, ",", ".") ?> </div>
                                            <div style="font-size: 20px;">Rp. <?= number_format(($d['product_price'] - ($d['product_price'] * $d['product_disc'] / 100)), 0, ",", ".") ?> </div>
                                        <?php endif; ?>
                                    </div>
                                    <a href="#" class="btn btn-primary float-right">Cek Produk Ini</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Informasi Untuk Anda</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="<?= base_url() ?>/assets/main/img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="<?= base_url() ?>/assets/main/img/blog/blog-2.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="<?= base_url() ?>/assets/main/img/blog/blog-3.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?= $this->endSection('konten') ?>