<?= $this->extend('user/user-template') ?>
<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">
        <a href="/user/product" class="btn btn-danger" id="open-modal"> <i class="fa fa-chevron-left"></i> Kembali</a>
    </div>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4> Tambah Data Produk</h4>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7">
                        <form action="/user/product" id="form-product" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Gambar Produk</label>
                                    <input type="file" name="product_image" class="form-control" id="product_image">
                                    <span class="text-danger"><i>Field tidak boleh kosong</i> </span>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="product_name" id="product_name" class="form-control">
                                    <!-- <span class="text-danger"><i>Field tidak boleh kosong</i> </span> -->
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Kategori</label>
                                    <select name="id_category" id="id_category" class="form-control">
                                        <option value="" disabled selected> -- Pilih Kategori --</option>
                                        <?php foreach ($category as $d) : ?>
                                            <option value="<?= $d->id ?>"> <?= $d->category_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Jumlah Tersedia</label>
                                    <input type="number" name="product_quantity" class="form-control" value="0">
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="">Harga Produk</label>
                                    <input type="text" name="product_price" class="form-control rupiah" id="product_price" onkeyup="hitung_netto()">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Diskon (%)</label>
                                    <input type="number" name="product_disc" class="form-control" id="product_disc" value="0" onkeyup="hitung_netto()" onchange="hitung_netto()">
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="">Harga Setelah Diskon (Netto)</label>
                                    <input type="text" disabled class="form-control" id="netto">

                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="">Deskripsi Produk</label>
                                    <textarea name="product_desc" id="product_desc" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <div class="gambar">
                            <img src="" alt="Preview Produk" id="preview-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-danger" id="add-produk" onclick="submit_form('#form-product')">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten') ?>
<?= $this->section('js') ?>
<script>
    $('.rupiah').mask('000.000.000.000.000', {
        reverse: true
    });


    function mask_to_int(string) {
        data = string.replace(/\./g, '')
        return parseInt(data)
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

    $("#product_image").change(function() {
        readURL(this);
    });

    function hitung_netto() {
        let product_price = $('#product_price').val()
        product_price = product_price === '' ? 0 : mask_to_int(product_price)
        let product_disc = $('#product_disc').val()
        let netto = product_price - (product_price * product_disc / 100)
        $('#netto').val(netto.toLocaleString('id-ID'))

    }

    function submit_form(link) {
        $(link).trigger('submit')
    }

    $('#form-product').on('submit', function(e) {
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
                loading()
            },
            success: function(res) {
                swal.close()
                if (res.status === true) {
                    // toaster("Berhasil", "Data Telah Diperbarui", "success")
                    window.location.replace('/user/product')
                } else {
                    toaster("Gagal", "Data Gagal Disimpan", "error")
                }
            }
        })
    })
</script>
<?= $this->endSection('js') ?>