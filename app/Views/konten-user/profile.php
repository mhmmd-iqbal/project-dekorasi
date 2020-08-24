<?= $this->extend('user/user-template') ?>

<?= $this->section('css') ?>
<style>
    .input-radio label {
        margin-right: 20px;
    }

    input[type='radio'] {
        margin-right: 5px;
    }


    input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #e15960;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    .logo {
        max-width: 150px;
        /*width: 400px;*/
        height: auto;
        float: none;
        margin-right: auto;
        margin-left: auto;
        margin-bottom: none;
    }

    .logo img {
        object-fit: cover;
        width: 100%;
    }
</style>
<?= $this->endSection('css') ?>
<?= $this->section('konten') ?>

<div class="row state-overview">
    <form action="/user/profile" method="POST" id="form-submitted" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="col-md-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Data Diri Saya</h4>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">
                                Username
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" name="username" class=" form-control" disabled>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class=" form-control">
                            <span class="text-danger"><i>Wajib Diisi</i></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-9 form-inline">
                            <div class="input-radio">
                                <label>
                                    <input type="radio" name="sex" id="input" value="male" checked>
                                    Pria
                                </label>
                                <label>
                                    <input type="radio" name="sex" id="input" value="female">
                                    Wanita
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Email</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="email" disabled autocomplete="off">
                            <!-- <span class=" text-danger"><i>Wajib Diisi</i></span> -->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Nomer HP</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="number" name="phone">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Alamat Tempat Tinggal</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="address" id="input" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Informasi Tempat Usaha</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo" id="image"></div>
                            <br>
                            <div class="logo">
                                <img id="preview-img" class="img-thumbnail" src="#" alt="Logo Preview Here" />
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Logo</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" id="company-logo" name="company_logo">
                                    <span class="text-danger"><i>Ukuran Maksimal : 300kb</i> </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Usaha</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">No HP</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="company_phone">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3"><label for="">Keterangan Usaha</label></div>
                                <div class="col-md-9">
                                    <textarea id="my-textarea" class="form-control" name="company_desc" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3"><label for="">Alamat Usaha</label></div>
                                <div class="col-md-9">
                                    <textarea id="my-textarea" class="form-control" name="company_address" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-danger"> <i class="fa fa-plus"></i> Simpan Perbaruan</button>
        </div>
    </form>
</div>
<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#company-logo").change(function() {
        readURL(this);
    });


    showData()

    const form_submitted = document.getElementById("form-submitted")



    $(form_submitted).submit(function(event) {
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
                loading()
        },
            success: (res) => {
                swal.close()
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
        $.getJSON("/user/profile/get",
            function(data, textStatus, jqXHR) {
                data.company_logo !== null ? $('#image').html('<img src="' + baseUrl + '/assets/logo/' + data.company_logo + '" >') : $('#image').html('')
                $('input[name=name]').val(data.name)
                $('input[name=username]').val(data.username)
                $('input[name=email]').val(data.email)
                $('input[name=phone]').val(data.phone)
                $('[name=address]').val(data.address)
                $('[name=company_name]').val(data.company_name)
                $('[name=company_address]').val(data.company_address)
                $('[name=company_phone]').val(data.company_phone)
                $('[name=company_desc]').val(data.company_desc)
                data.sex === 'male' ? $('input[name=sex][value=male]').prop("checked", true) : $('input[name=sex][value=female]').prop("checked", true)
            }
        );
    }
</script>
<?= $this->endSection('js') ?>