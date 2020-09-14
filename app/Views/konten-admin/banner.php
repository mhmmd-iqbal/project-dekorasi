<?= $this->extend('admin/admin-template') ?>

<?= $this->section('css') ?>
<style>
    .btn.btn-sm {
        margin: 0 .5vmin
    }
</style>
<?= $this->endSection('css') ?>

<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <button class="btn btn-danger" onclick="modal_show('#modal-add')">Tambah Data Baru</button>
    </div>

    <div class="col-md-10">
        <div class="panel">
            <div class="panel-heading">
                <h4> Banner</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar Banner</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    <tbody></tbody>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Banner</h4>
            </div>
            <div class="modal-body">
                <form action="" class="form" enctype="multipart/form-data" id="form-banner">
                    <div class="form-group">
                        <label for="">Upload File</label>
                        <input type="file" name="banner_image" class="form-control" id="banner-image" accept="image/*">
                        <small class="text-danger">File banner maksimal 500KB. Ukuran gambar sebaiknya Potrait agar hasil lebih baik</small>
                    </div>
                    <div class="form-group" style="height: 50vmin;">
                        <div class="gambar">
                            <img href="" id="preview-img" alt="Preview Banner">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary" onclick="submit_form('#form-banner')">Simpan</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>
<script>
    function modal_show(link) {
        $(link).modal('toggle')
        $('#form-banner').prop('action', '/sys/banner').attr('method', 'post')
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#banner-image").change(function() {
        readURL(this);
    });

    function submit_form(form) {
        $(form).trigger('submit')
    }

    $('#form-banner').on('submit', function(e) {
        e.preventDefault()
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = new FormData(this)
        let banner_image = document.getElementById('banner-image')

        console.log(banner_image.value);
        if (banner_image.value == '') {
            return notif("Warning", "Gambar Tidak Boleh Kosong!", "warning")
        }
        $.ajax({
            url: post_url,
            type: request_method,
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: () => {
                loading()
            },
            success: function(res) {
                console.log(res);
                if (res.status === true) {
                    notif("Berhasil", "Data Telah Diperbarui", "success")
                    $(this).trigger('reset')
                    showData()
                } else {
                    notif("Gagal", "Data Gagal Disimpan", "error")
                }
                $('#modal-add').modal('toggle')
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText)
                swal.fire({
                    title: "Error : " + xhr.status,
                    text: xhr.statusText,
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    })

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
                url: "/sys/banner/all",
                type: "POST",
            },

            columnDefs: [{
                targets: [0],
                orderable: false,
            }, ],
        });
    }

    showData()

    $('#data-table').on('click', '.publish', function() {
        let id = $(this).data('id')
        $.ajax({
            url: '/sys/banner/publish/' + id,
            type: 'PUT',
            dataType: 'JSON',
            beforeSend: () => {
                loading()
            },
            success: (res) => {
                if (res.status === true) {
                    showData()
                    return notif("Berhasil", "Banner telah dipublish", "success")
                }
                return notif("Gagal", "Terjadi kesalahan", "error")
            },
            error: (xhr, status, error) => {
                console.log(xhr.responseText)
                swal.fire({
                    title: "Error : " + xhr.status,
                    text: xhr.statusText,
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    })
</script>
<?= $this->endSection('js') ?>