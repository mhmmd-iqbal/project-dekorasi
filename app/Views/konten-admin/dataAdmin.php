<?= $this->extend('admin/admin-template') ?>


<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <button class="btn btn-danger" id="open-modal">Tambah Data Baru</button>
    </div>

    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4> Master Data Admin</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="">Username</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Created At</label>
                        <div class="row row-no-gutters">
                            <div class="col-md-6 form-group">
                                <input type="date" name="" id="" class="form-control" placeholder="From...">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="date" name="" id="" class="form-control" placeholder="To...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                <form action="/sys/admin" method="POST" id="submit-form">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username..." name="username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email..." name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password..." name="password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <strong>Status</strong>
                        <br><br>
                        <input type="radio" name="status" checked data-value="1" value="1">
                        <div class="badge badge-blue">
                            Aktif
                        </div>
                        <input type="radio" name="status" data-value="0" value="0">
                        <div class="badge badge-red">
                            Tidak Aktif
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="load-umum-show">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-submit-form">Simpan</button>
            </div>
            <div class="modal-footer" id="load-umum-hide" hidden>
                <button type="button" class="btn btn-primary" disabled><i class="fa fa-refresh fa-spin"></i></button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('modal') ?>

<?= $this->section('js') ?>
<script>
    $(".master").removeClass("active");
    $("#admin").addClass("active");

    showData()

    function showData() {
        let table = $("#data-table").DataTable({
            orderable: false,
            destroy: true,
            responsive: false,
            processing: true,
            serverSide: true,
            stateSave: true,
            order: [],

            ajax: {
                url: "/sys/admin/all",
                type: "POST",
            },

            columnDefs: [{
                targets: [0],
                orderable: false,
            }, ],
        });
    }

    $("#open-modal").click(function(e) {
        e.preventDefault();
        $("#modal-form").modal("toggle");
    });

    $('#btn-submit-form').click(() => {
        $('#submit-form').trigger("submit");
    });

    $('#submit-form').submit(function(e) {
        e.preventDefault()
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = new FormData(this)
        $.ajax({
            url: post_url,
            type: request_method,
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: () => {
                // loading()
                $('#load_umum_show').attr('hidden', false)
                $('#load_umum_hide').attr('hidden', true)
            },
            success: (res) => {
                // swal.close()
                $('#load_umum_show').attr('hidden', true)
                $('#load_umum_hide').attr('hidden', false)
                if (res.status === true) {
                    toaster("Berhasil", "Data Telah Disimpan", "success")
                    $(this).trigger("reset");
                    $("#modal-form").modal("toggle");
                    showData()
                } else {
                    toaster("Gagal", "Data Gagal Disimpan", "error")
                }
            }
        })
    });

    $("#data-table").on('click', '.non-aktif', function(e) {
        let id = $(this).val()
        $.ajax({
            type: "POST",
            url: "/sys/admin/deactivate/",
            data: {
                "id": id,
                "_token": '<?= csrf_token(); ?>'
            },
            dataType: "JSON",
            success: function(response) {
                showData()
            }
        });
    })
    $("#data-table").on('click', '.aktif', function(e) {
        let id = $(this).val()

        $.ajax({
            type: "POST",
            url: "/sys/admin/activate/",
            data: {
                "id": id,
                "_token": '<?= csrf_token(); ?>'
            },
            dataType: "JSON",
            success: function(response) {
                showData()
            }
        });
    })
</script>
<?= $this->endSection('js') ?>