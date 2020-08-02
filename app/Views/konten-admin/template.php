<?= $this->extend('admin/admin-template') ?>

<?= $this->section('konten') ?>
<!--state overview start-->
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-user"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    0
                </h1>
                <p>New Users</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-tags"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    0
                </h1>
                <p>Sales</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    0
                </h1>
                <p>New Order</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    0
                </h1>
                <p>Total Profit</p>
            </div>
        </section>
    </div>
</div>
<!--state overview end-->
<div class="row">
    <div class="col-lg-8">
        <!--latest product info start-->
        <section class="panel post-wrap pro-box">
            <aside>
                <div class="post-info">
                    <span class="arrow-pro right"></span>
                    <div class="panel-body">
                        <h1><strong>popular</strong> <br> Brand of this week</h1>
                        <div class="desk yellow">
                            <h3>Dimond Ring</h3>
                            <p>Lorem ipsum dolor set amet lorem ipsum dolor set amet ipsum dolor set amet</p>
                        </div>
                        <div class="post-btn">
                            <a href="javascript:;">
                                <i class="fa fa-chevron-circle-left"></i>
                            </a>
                            <a href="javascript:;">
                                <i class="fa fa-chevron-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="post-highlight yellow v-align">
                <div class="panel-body text-center">
                    <div class="pro-thumb">
                        <img src="<?= base_url() ?>/assets/template/cms/img/ring.jpg" alt="">
                    </div>
                </div>
            </aside>
        </section>
        <!--latest product info end-->
        <!--twitter feedback start-->
        <section class="panel post-wrap pro-box">
            <aside class="post-highlight terques v-align">
                <div class="panel-body">
                    <h2>Flatlab is new model of admin dashboard <a href="javascript:;"> http://demo.com/</a> 4 days ago by jonathan smith</h2>
                </div>
            </aside>
            <aside>
                <div class="post-info">
                    <span class="arrow-pro left"></span>
                    <div class="panel-body">
                        <div class="text-center twite">
                            <h1>Twitter Feed</h1>
                        </div>

                        <footer class="social-footer">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </footer>
                    </div>
                </div>
            </aside>
        </section>
        <!--twitter feedback end-->
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-xs-6">
                <!--pie chart start-->
                <section class="panel">
                    <div class="panel-body">
                        <div class="chart">
                            <div id="pie-chart"></div>
                        </div>
                    </div>
                    <footer class="pie-foot">
                        Free: 260GB
                    </footer>
                </section>
                <!--pie chart start-->
            </div>
            <div class="col-xs-6">
                <!--follower start-->
                <section class="panel">
                    <div class="follower">
                        <div class="panel-body">
                            <h4>Jonathan Smith</h4>
                            <div class="follow-ava">
                                <img src="<?= base_url() ?>/assets/template/cms/img/follower-avatar.jpg" alt="">
                            </div>
                        </div>
                    </div>

                    <footer class="follower-foot">
                        <ul>
                            <li>
                                <h5>2789</h5>
                                <p>Follower</p>
                            </li>
                            <li>
                                <h5>270</h5>
                                <p>Following</p>
                            </li>
                        </ul>
                    </footer>
                </section>
                <!--follower end-->
            </div>
        </div>
        <!--weather statement start-->
        <section class="panel">
            <div class="weather-bg">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-cloud"></i>
                            California
                        </div>
                        <div class="col-xs-6">
                            <div class="degree">
                                24°
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="weather-category">
                <ul>
                    <li class="active">
                        <h5>humidity</h5>
                        56%
                    </li>
                    <li>
                        <h5>precip</h5>
                        1.50 in
                    </li>
                    <li>
                        <h5>winds</h5>
                        10 mph
                    </li>
                </ul>
            </footer>

        </section>
        <!--weather statement end-->
    </div>
</div>
<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>
<!--script for this page-->
<script src="<?= base_url() ?>/assets/template/cms/js/sparkline-chart.js"></script>
<script src="<?= base_url() ?>/assets/template/cms/js/easy-pie-chart.js"></script>
<script src="<?= base_url() ?>/assets/template/cms/js/count.js"></script>
<?= $this->endSection('js') ?>