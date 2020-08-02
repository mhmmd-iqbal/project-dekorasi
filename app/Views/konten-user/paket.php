<?= $this->extend('user/user-template') ?>
<?= $this->section('css') ?>
<style>
    .badge-red {
        background-color: crimson;
        color: white;
    }

    .badge-blue {
        background-color: dodgerblue;
        color: floralwhite;
    }
</style>
<?= $this->endSection('css') ?>
<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-lg-12" style="padding-bottom: 10px;">
        <button class="btn btn-primary" id="show-modal">
            Tambah Data Paket
        </button>
    </div>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4> Data Paket</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="">Nama Paket</label>
                        <input type="text" name="kategori" id="" class="form-control">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">kategori</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Range Harga</label>
                        <div class="row row-no-gutters">
                            <div class="col-md-6 form-group">
                                <input type="number" name="" id="" class="form-control" placeholder="From...">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" name="" id="" class="form-control" placeholder="To...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button class="btn btn-danger btn-block"> Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12" style="padding-top: 10px;">
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th width="3px">No</th>
                                <th>Nama Paket</th>
                                <th>Kategori</th>
                                <th>Harga (Rp.)</th>
                                <th>Status</th>
                                <th>Transaksi Paket</th>
                                <th>Ulasan</th>
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

<div class="modal fade" id="modal-box">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Paket</h4>
            </div>
            <div class="modal-body">
                <form action="/user/AksiPaket/tambah" method="POST" id="form-action" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="">Gambar Paket (Optional)</label>
                            <input type="file" name="gambar" class="form-control">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Ukuran file maksimal 500kb
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label for="">Nama Paket</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="">Harga (Rp.)</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label for="">Kategori Paket</label>
                            <select name="kategori" id="input" class="form-control">
                                <option value="" disabled selected>-- Pilih Kategori Produk --</option>
                                <?php foreach ($kategori as $d) : ?>
                                    <option value="<?= $d['kategori'] ?>"> <?= $d['kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Deskripsi Paket</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div id="load-umum-show">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submit-form">
                        Simpan
                    </button>
                </div>
                <div id="load-umum-hide" hidden>
                    <button type="button" class="btn btn-primary" disabled>
                        <i class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Paket</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 gambar" id="gambar"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4 id="paket"></h4>
                        <p id="kategori">kategori</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 text-left">
                        <b for="">10 Transaksi berhasil</b>
                    </div>
                    <div class="col-lg-6 text-right">
                        <b for=""> <span id="totalUlasan">0</span> Ulasan Produk</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <b for="">Keterangan</b>
                        <p id="keterangan"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-success" id="detail-produk">Detail Produk</a>
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
                url: "/user/AksiPaket/get",
                type: "POST",
            },

            columnDefs: [{
                targets: [0],
                orderable: false,
            }, ],
        });
    }
    $("#data-table").on('click', '.detail', function(event) {
        event.preventDefault();
        let id = $(this).val()
        $('#modal-detail').modal('toggle')
        $.getJSON("/user/AksiPaket/detail/" + id,
            function(data, textStatus, jqXHR) {
                data.gambar !== null ? $('#gambar').html('<img src="' + baseUrl + '/assets/paket/' + data.gambar + '" alt="Gambar Paket">') : $('#gambar').html("")
                $('#paket').html(data.nama + ' - Harga: Rp.' + data.harga)
                $('#keterangan').html(data.keterangan)
                $('#kategori').html(data.kategori)
                $('#totalUlasan').html(data.totalUlasan)
                $('#detail-produk').prop('href', '/user/paket/' + data.slug)
            }
        );
    })

    $("#show-modal").click(function(e) {
        e.preventDefault();
        $('#modal-box').modal('toggle')
    });

    $("#submit-form").click(function(e) {
        e.preventDefault();
        $("#form-action").trigger("submit");
    });

    const load_umum_show = document.getElementById("load-umum-show")
    const load_umum_hide = document.getElementById("load-umum-hide")

    $("#form-action").submit(function(e) {
        e.preventDefault();
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
                $(load_umum_show).attr('hidden', false)
                $(load_umum_hide).attr('hidden', true)
            },
            success: (res) => {
                // swal.close()
                $(load_umum_show).attr('hidden', true)
                $(load_umum_hide).attr('hidden', false)
                if (res.status === true) {
                    toaster("Berhasil", "Data Telah Disimpan", "success")
                    $(this).trigger("reset");
                    $('#modal-box').modal('toggle')
                    showData()
                } else {
                    toaster("Gagal", "Data Gagal Disimpan", "error")
                }
            }
        })
    });
</script>
<?= $this->endSection('js') ?>