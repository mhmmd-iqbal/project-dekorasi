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
                        <form action="">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Gambar Produk</label>
                                    <input type="file" name="product_image" class="form-control" id="">
                                    <span class="text-danger"><i>Field tidak boleh kosong</i> </span>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="product_name" id="" class="form-control">
                                    <!-- <span class="text-danger"><i>Field tidak boleh kosong</i> </span> -->
                                </div>
                                <div class="col-md-7 form-group">
                                    <label for="">Kategori</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled selected> -- Pilih Kategori --</option>
                                        <?php foreach ($category as $d) : ?>
                                            <option value="<?= $d->id ?>"> <?= $d->category_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="">Harga Produk</label>
                                    <input type="number" name="product_price" class="form-control" id="product_price">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Diskon (%)</label>
                                    <input type="number" name="product_disc" class="form-control" id="product_disc" value="0">
                                </div>
                                <div class="col-md-5 form-group">
                                    <label for="">Harga Setelah Diskon (Netto)</label>
                                    <input type="number" disabled class="form-control" id="netto">

                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="">Deskripsi Produk</label>
                                    <textarea name="product_desc" id="" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection('konten') ?>
<?= $this->section('js') ?>
<script>
    $('#product_price').on('keyup', function() {
        netto();
    })
    $('#product_desc').on('keyup', function() {
        netto();
    })

    netto = () => {
        let product_price = $('#product_price').val()
        let product_disc = $('#product_disc').val()

        netto = product_price - (product_price * product_disc / 100)

        $('#netto').val(netto)
    }
</script>
<?= $this->endSection('js') ?>