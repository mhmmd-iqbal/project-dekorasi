<?= $this->extend('admin/admin-template') ?>


<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <button class="btn btn-white" id="open-modal">Tambah Data Baru</button>
    </div>

    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4><i class="fa fa-chevron-right"></i> Master Data Admin</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- Filter Menu  -->
                    <div class="col-md-12" style="padding-bottom: 10px;">
                        <form action="">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Cari Berdasarkan</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Username</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Created At</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection('konten') ?>

<?= $this->section('modal') ?>


<div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Admin</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="Username..." name="username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password..." name="password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <strong>Status</strong>
                        <br><br>
                        <input type="radio" name="status" id="status" data-value="1" value="1">
                        <div class="badge badge-blue">
                            Aktif
                        </div>
                        <input type="radio" name="status" id="status" data-value="0" value="0">
                        <div class="badge badge-red">
                            Tidak Aktif
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('modal') ?>

<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/admin/dataAdmin.js"></script>
<?= $this->endSection('js') ?>