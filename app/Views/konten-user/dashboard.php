<?= $this->extend('user/user-template') ?>
<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-lg-12">
        <h4 style="font-weight: bold; text-align:right; font-style:italic"><img src="" alt="" id="logo" style="max-height: 22px;"> <span id="nama-usaha"></span></h4>
    </div>
    <div class="col-lg-12">
        <div class="alert alert-info text-center">
            <p><b><i class="fa fa-exclamation"></i> PERHATIAN</b></p>
            <p> Batas waktu promosi jasa dekorasi anda adalah sampai dengan <b>31 Januari 2021</b>. Silahkan menghubungi <b>Admin</b> untuk memperpanjang masa sewa </p>
        </div>
    </div>
</div>

<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="value">
                <h1 class="count" id="newest-transaksi">
                    0
                </h1>
                <p>Transaksi Terbaru</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-gift"></i>
            </div>
            <div class="value">
                <h1 class="count" id="total-paket">
                    0
                </h1>
                <p>Paket Anda</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-money"></i>
            </div>
            <div class="value">
                <h1 class=" count2" id="invoice-saya">
                    0
                </h1>
                <p>Invoice Bulan Ini</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-star-o"></i>
            </div>
            <div class="value">
                <h1 class=" count3" id="review-saya">
                    0
                </h1>
                <p>Review Tentang Anda</p>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <div class="follower">
                <div class="panel-body">
                    <h3 class="">
                        Data Pemesanan Terbaru
                    </h3>
                </div>
            </div>

            <footer class="follower-foot">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </footer>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <div class="weather-bg">
                <div class="panel-body">
                    <h3 class="">
                        Grafik Invoice Tahun 2020
                    </h3>
                </div>
            </div>

            <footer class="weather-category">

            </footer>
    </div>
</div>
<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>
<script>
    $.getJSON("/user/AksiProfile/getDataUser",
        function(data, textStatus, jqXHR) {
            $('#nama-usaha').html(data.name_usaha)
            $('#logo').prop('src', baseUrl + '/assets/logo/' + data.logo)
        }
    )

    $.getJSON("/user/AksiPaket/totalPaket",
        function(data, textStatus, jqXHR) {
            $('#total-paket').html(data)
        }
    );
</script>
<?= $this->endSection('js') ?>