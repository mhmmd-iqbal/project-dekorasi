<?= $this->extend('user/user-template') ?>
<?= $this->section('konten') ?>

<div class="row state-overview">
    <?php foreach ($review as $d) : ?>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><?= $d->reviewer_name ?> </h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 text-left" id="star">
                            <?php for ($i = 0; $i < $d->point; $i++) : ?>
                                <i class="fa fa-star fa-2x text-warning"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="col-md-6 text-right" id="transakksi">
                            <p> <?= $d->nama ?> - <?= $d->id_trx ?></p>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: center;">" <?= $d->komentar ?> "</p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer" style="background-color: #E5E5E5;">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <div style="font-style: italic;"><i class="fa fa-phone"></i> <?= $d->reviewer_phone ?></div>

                        </div>
                        <div class="col-md-6 text-right">
                            <div style="font-style: italic;"><?= date('d-m-Y h:i:s', strtotime($d->created_at)) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-12 text-center" data-aos="fade-up" data-aos-delay="200">
        <ul class="pagination">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row" style="padding-left: 40px;">
                    <div class="col-md-4 form-group">
                        <p><span id="bintang-1">0</span> Ulasan</p>
                        <?php for ($i = 0; $i < 1; $i++) : ?>
                            <i class="fa fa-star fa-2x text-warning"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="col-md-4 form-group ">
                        <p><span id="bintang-2">0</span> Ulasan</p>
                        <?php for ($i = 0; $i < 2; $i++) : ?>
                            <i class="fa fa-star fa-2x text-warning"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="col-md-4 form-group ">
                        <p><span id="bintang-3">0</span> Ulasan</p>
                        <?php for ($i = 0; $i < 3; $i++) : ?>
                            <i class="fa fa-star fa-2x text-warning"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="col-md-4 form-group ">
                        <p><span id="bintang-4">0</span> Ulasan</p>
                        <?php for ($i = 0; $i < 4; $i++) : ?>
                            <i class="fa fa-star fa-2x text-warning"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="col-md-4 form-group ">
                        <p><span id="bintang-5">0</span> Ulasan</p>
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <i class="fa fa-star fa-2x text-warning"></i>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>
<script>
    $.getJSON("/user/AksiReviewPaket/getBintangCount",
        function(data, textStatus, jqXHR) {
            $('#bintang-1').html(data[1]);
            $('#bintang-2').html(data[2]);
            $('#bintang-3').html(data[3]);
            $('#bintang-4').html(data[4]);
            $('#bintang-5').html(data[5]);
        }
    );
</script>
<?= $this->endSection('js') ?>