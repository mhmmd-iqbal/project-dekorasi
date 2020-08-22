<?= $this->extend('admin/admin-template') ?>


<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-md-12" style="padding-bottom: 10px;">

        <div class="alert alert-info">
            <strong>Keterangan</strong>
            <p>Data user akan di generate secara otomatis ketika data seller dan/atau data customer diinputkan</p>
        </div>

    </div>

    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4> Master Data User</h4>
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
                                <th>Level</th>
                                <th>Status</th>
                                <th>Created At</th>
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

<?= $this->section('js') ?>
<script>
    $(".master").removeClass("active");
    $("#user").addClass("active");

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
                url: "/sys/user/all",
                type: "POST",
            },

            columnDefs: [{
                targets: [0],
                orderable: false,
            }, ],
        });
    }

    $("#data-table").on('click', '.non-aktif', function(e) {
        let username = $(this).val()
        $.ajax({
            type: "POST",
            url: "/sys/user/deactivate/",
            data: {
                "username": username,
                "_token": '<?= csrf_token(); ?>'
            },
            dataType: "JSON",
            success: function(response) {
                showData()
            }
        });
    })

    $("#data-table").on('click', '.aktif', function(e) {
        let username = $(this).val()
        $.ajax({
            type: "POST",
            url: "/sys/user/activate/",
            data: {
                "username": username,
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