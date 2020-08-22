<?= $this->extend('admin/admin-template') ?>
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
<div class="row">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <a href="/sys/seller" class="btn btn-info"><i class="fa fa-chevron-left"></i> Back</a>
    </div>
</div>
<div class="row state-overview">
    <form action="" action="" method="" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="col-md-5">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Data Contact Seller</h4>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="" class="form-control">
                            <span class="text-danger"><i>Required Field</i></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Gender</label>
                        </div>
                        <div class="col-md-9 form-inline">
                            <div class="input-radio">
                                <label>
                                    <input type="radio" name="gender" id="input" value="pria" checked>
                                    Male
                                </label>
                                <label>
                                    <input type="radio" name="gender" id="input" value="wanita">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Email</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="" autocomplete="off">
                            <span class="text-danger"><i>Required Field</i></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Phone</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="number" name="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Address</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="" id="input" class="form-control" rows="4" required="required"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Company Information</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">

                                <img id="preview-img" class="img-thumbnail" src="#" alt="Logo Preview Here" />
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Logo Image</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" id="company-logo" name="">
                                    <span class="text-danger"><i>Maksimum size : 300kb</i> </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Company Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3"><label for="">Company Description</label></div>
                                <div class="col-md-9">
                                    <textarea id="my-textarea" class="form-control" name="" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3"><label for="">Company Address</label></div>
                                <div class="col-md-9">
                                    <textarea id="my-textarea" class="form-control" name="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-danger"> <i class="fa fa-plus"></i> Create New Data Seller</button>
        </div>
    </form>
</div>
<?= $this->endSection('konten') ?>
<?= $this->section('js') ?>
<script>
    $(".master").removeClass("active");
    $("#seller").addClass("active");

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
</script>
<?= $this->endSection('js') ?>