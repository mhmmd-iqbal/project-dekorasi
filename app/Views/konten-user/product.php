<?= $this->extend('user/user-template') ?>
<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <a href="/user/product/new" class="btn btn-danger">Tambah Data Baru</a>
    </div>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4> Data Produk</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Diskon (%)</th>
                                <th>Harga Setelah Diskon</th>
                                <th>Aksi</th>
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
<?= $this->section('js') ?>
<script>
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
                url: "/user/product/all",
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