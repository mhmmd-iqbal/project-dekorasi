<?= $this->extend('admin/admin-template') ?>


<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <button class="btn btn-danger" id="open-modal">Tambah Data Baru</button>
    </div>

    <div class="col-md-10">
        <div class="panel">
            <div class="panel-heading">
                <h4> Master Data User</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori</th>
                                <th>Bergabung Pada</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <form action="/admin/AksiKategori/add" method="POST" id="submit-form">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="">Kategori</label>
                            <input type="text" class="form-control" placeholder="Username..." name="kategori" autocomplete="off">
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
    $("#kategori").addClass("active");

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
                url: "/admin/AksiKategori/get",
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
</script>
<?= $this->endSection('js') ?>