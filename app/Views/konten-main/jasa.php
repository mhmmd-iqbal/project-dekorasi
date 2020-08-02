<?= $this->extend('main/main-template') ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="">
<?= $this->endSection('css') ?>
<?= $this->section('konten') ?>
<main id="main">


    <section class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center p-5">
                    <div class="section-title">
                        <h2>Info Jasa Dekorasi</h2>
                        <p>Belum Menemukan Apa Yang Anda Cari? Gunakan Menu Filter Dibawah </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" method="POST">
                                <?= @csrf_field() ?>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label for="">Nama Jasa Dekor</label>
                                        <input type="text" placeholder="-- Nama Pemilik Jasa --" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="">Wilayah Kerja</label>
                                        <select name="" id="" class="form-control">
                                            <option value="" selected>-- Wilayah Dekor --</option>
                                            <optgroup label="Aceh">
                                                <option value=""> Lhokseumawe</option>
                                                <option value=""> Bireuen</option>
                                            </optgroup>
                                            <optgroup label="Sumatera Utara">
                                                <option value=""> Kota Medan</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-block btn-primary"><i class="fa fa-search"></i> Cari Berdasarkan Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-bg">
        <div class="container">
            <div class="row">
                <?php
                for ($i = 1; $i < 10; $i++) :
                ?>
                    <div class="col-lg-4 py-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="card info-jasa">
                            <img src="https://th.bing.com/th/id/OIP.hSJP8VbhLqACvy3n8LsV9wHaD2?pid=Api&rs=1" alt="Avatar" style="width:100%">
                            <div class="card-body">
                                <h3><a href="">Nama Pemilik Jasa</a></h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p class="card-text">Hp. 0821 6567 8664</p>
                            </div>
                            <div class="card-footer">
                                <small style="float: left;">Area Wilayah Kerja</small>
                                <div style="float: right; font-size: 20px">
                                    <a href=""><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endfor;
                ?>
            </div>
            <div class="row pt-5">
                <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-us" data-aos="fade-right" data-aos-delay="200">
        <div class=" container">
            <div class="row">
                <div class="bg-dark col-lg-12 d-flex flex-column justify-content-center p-5">
                    <h3>
                        Ingin Usaha Jasa Dekormu Dipromosikan Di Sini ? Hubungi Kami Segera
                    </h3>
                </div>
            </div>
        </div>
    </section><!-- End Why Us Section -->
</main>
<?= $this->endSection('konten') ?>
<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/javascript/main/jasa.js"></script>
<?= $this->endSection('js') ?>