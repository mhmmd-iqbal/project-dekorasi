<?= $this->extend('user/user-template') ?>
<?= $this->section('konten') ?>
<div class="row">
    <div class="col-lg-12">

        <div class="d-flex justify-content-start">
            <a href="#home" class="btn btn-primary" aria-controls="home" id="btn-profile-umum" role="tab" data-toggle="tab">Profile Umum</a>
            <a href="#lanjutan" class="btn btn-primary" aria-controls="tab" id="btn-lanjutan" role="tab" data-toggle="tab">Profile Lanjutan</a>
            <!-- <a href="#tab" class="btn btn-primary" aria-controls="tab" id="btn-wilayah-kerja" role="tab" data-toggle="tab">Wilayah Kerja</a> -->

        </div>
    </div>
    <div class="col-lg-12" style="padding-top: 10px;">
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Tab Satu  -->
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4> Informasi Umum</h4>
                    </div>
                    <div class="panel-body">
                        <div role="tabpanel">
                            <form action="/user/AksiProfile/update" method="POST" id="form-umum" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="row" style="padding-bottom: 10px;">
                                            <div class="col-lg-12 form-group">
                                                <label for="">Logo (Optional)</label>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    Ukuran file maksimal 500kb
                                                </small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12" style="padding-bottom: 10px;">
                                                <label for="">Logo Usaha Anda Saat Ini</label>
                                            </div>
                                            <div class="col-lg-12" id="image"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="row">

                                            <div class="col-lg-8 form-group">
                                                <label for="">Nama Usaha</label>
                                                <input type="text" name="name_usaha" class="form-control">
                                            </div>
                                            <div class="col-lg-4 ">
                                                <label for="">No Hp Tempat Usaha</label>
                                                <input type="number" name="phone_usaha" class="form-control">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="whatsapp_usaha" value="1" style="margin-right: 5px">
                                                    <label class="form-check-label" style="font-weight: 500;" for="inlineCheckbox1"> Terhubung ke Whatsapp</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 form-group">
                                                <label for="">Pemilik</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="col-lg-4 ">
                                                <label for="">No HP Pemilik</label>
                                                <input type="number" name="phone" class="form-control">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="whatsapp" style="margin-right: 5px">
                                                    <label class="form-check-label" style="font-weight: 500;" for="inlineCheckbox1"> Terhubung ke Whatsapp</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <label for="">Kabupaten</label>
                                                <select name="kabupaten" id="kabupaten" class="form-control">

                                                </select>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label for="">Alamat Lengkap Tempat Usaha</label>
                                                <textarea name="address" id="" rows="4" class="form-control"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-lg-11 col-md-11 text-right" id="load-umum-hide">
                                <button class="btn btn-primary" id="submit-form-umum">
                                    Simpan
                                </button>
                            </div>
                            <div class="col-lg-11 col-md-11 text-right" id="load-umum-show" hidden>
                                <button class="btn btn-primary" disabled>
                                    <i class="fa fa-refresh fa-spin"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div role="tabpanel" class="tab-pane" id="tab">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4> Wilayah Kerja</h4>
                    </div>
                    <div class="panel-body">
                        <div role="tabpanel">
                            <form action="" method="POST" id="form-wilayah-kerja">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">Pilih 1 atau lebih wilayah kerja jasa Dekorasi Anda</label>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-10">
                                        <b>PROVINSI ACEH</b>
                                        <div class="row" id="show_provinsi_aceh">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-lg-11 col-md-11 text-right">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div role="tabpanel" class="tab-pane" id="lanjutan">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4> Informasi Lanjutan</h4>
                    </div>
                    <div class="panel-body">
                        <div role="tabpanel">
                            <form action="/user/AksiProfile/updateLanjutan" method="POST" id="form-lanjutan" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="">Informasi Toko Saya</label>
                                                <textarea name="description" id="input" class="form-control" rows="16"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="">Cover Profile Toko</label>
                                                <input type="file" name="cover" class="form-control" accept="image/*">

                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    Ukuran file maksimal 700kb
                                                </small>
                                            </div>
                                            <div class="col-md-12 gambar" id="show-cover"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-lg-11 col-md-11 text-right">
                                <button class="btn btn-primary" id="btn-form-lanjutan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>
<script>
    const home = document.getElementById("btn-profile-umum")
    const tab = document.getElementById("btn-wilayah-kerja")
    let opt_kab = ''
    let kab = document.getElementById('kabupaten')

    showData()

    $.getJSON("https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=11",
        function(data, textStatus, jqXHR) {
            console.table(data);
            data.kota_kabupaten.forEach(element => {
                opt_kab += '<option value="' + element.nama + '">' + element.nama + '</option>'
            })
            kab.innerHTML = opt_kab
        }
    )
    tab.addEventListener("click", function() {
        let html_provinsi_aceh = ''
        let provinsi_aceh = document.getElementById('show_provinsi_aceh')
        $.getJSON("https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=11",
            function(data, textStatus, jqXHR) {
                console.table(data);
                data.kota_kabupaten.forEach(element => {
                    html_provinsi_aceh += '<div class="col-lg-4">' +
                        '<div class="form-check form-check-inline">' +
                        '<input class="form-check-input" type="checkbox" data-target="id-' + element.id + '" name="" value="' + element.nama + '" style="margin-right: 5px">' +
                        '<label class="form-check-label" style="font-weight: 500;" for="inlineCheckbox1" > ' + element.nama + '</label>' +
                        '</div>' +
                        '</div>'
                });
                provinsi_aceh.innerHTML = html_provinsi_aceh
            }
        );
    });

    const submit_form_umum = document.getElementById("submit-form-umum")
    const form_umum = document.getElementById("form-umum")
    const load_umum_show = document.getElementById("load-umum-show")
    const load_umum_hide = document.getElementById("load-umum-hide")

    $(submit_form_umum).click(function(e) {
        e.preventDefault();
        $(form_umum).trigger('submit');
    });

    $(form_umum).submit(function(event) {
        event.preventDefault(); //prevent default action 
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
                    toaster("Berhasil", "Data Telah Diperbarui", "success")
                    showData()
                } else {
                    toaster("Gagal", "Data Gagal Disimpan", "error")
                }
            }
        })
    });

    function showData() {
        $.getJSON("/user/AksiProfile/getDataUser",
            function(data, textStatus, jqXHR) {

                data.logo !== null ? $('#image').html('<img src="' + baseUrl + '/assets/logo/' + data.logo + '" style="max-width: 200px;">') : $('#image').html('')

                data.cover !== null ? $('#show-cover').html('<img src="' + baseUrl + '/assets/cover/' + data.cover + '">') : $('#show-cover').html("")

                $('input[name=name_usaha]').val(data.name_usaha)
                $('input[name=name]').val(data.name)
                $('input[name=phone_usaha]').val(data.phone_usaha)
                $('input[name=phone]').val(data.phone)
                $('[name=address]').val(data.address)
                $('[name=description]').val(data.description)
                $('select[name=kabupaten] option[value="' + data.kabupaten + '"]').attr("selected", true);
                data.whatsapp === '1' ? $('input[name=whatsapp]').prop("checked", true) : ''
                data.whatsapp_usaha === '1' ? $('input[name=whatsapp_usaha]').prop("checked", true) : ''
            }
        );
    }

    $('#btn-form-lanjutan').click(function(e) {
        e.preventDefault();
        $('#form-lanjutan').trigger('submit');
    });

    $('#form-lanjutan').submit(function(e) {
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
                loading()
                // $(load_umum_show).attr('hidden', false)
                // $(load_umum_hide).attr('hidden', true)
            },
            success: (res) => {
                swal.close()
                // $(load_umum_show).attr('hidden', true)
                // $(load_umum_hide).attr('hidden', false)
                if (res.status === true) {
                    $(this).trigger('reset')
                    toaster("Berhasil", "Data Telah Diperbarui", "success")
                    showData()
                } else {
                    toaster("Gagal", "Data Gagal Disimpan", "error")
                }
            },
            error: () => {
                swal.close()
                alert("Failed")
            }
        })
    });
</script>
<?= $this->endSection('js') ?>