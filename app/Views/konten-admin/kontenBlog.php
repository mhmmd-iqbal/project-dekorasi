<?= $this->extend('admin/admin-template') ?>
<?= $this->section('konten') ?>
<div class="row state-overview">
   <div class="col-md-12" style="padding-bottom: 10px;">
      <a href="/sys/blog/new" class="btn btn-danger">Tambah Data Baru</a>
   </div>

   <div class="col-md-12">
      <div class="panel">
         <div class="panel-heading">
            <h4> Konten Blog</h4>
         </div>

         <div class="panel-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="data-table">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Slug</th>
                        <th>Created At</th>
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
<?= $this->endSection('konten') ?>


<?= $this->section('js') ?>
<script>
   $(".sub__blog").removeClass("active");
   $("#konten_blog").addClass("active");



   // function showData() {
   //    let table = $("#data-table").DataTable({
   //       orderable: false,
   //       destroy: true,
   //       responsive: false,
   //       processing: true,
   //       serverSide: true,
   //       stateSave: true,
   //       order: [],

   //       ajax: {
   //          url: "/sys/cat_blog/all",
   //          type: "POST",
   //       },

   //       columnDefs: [{
   //          targets: [0],
   //          orderable: false,
   //       }, ],
   //    });
   // }

   // showData()
</script>
<?= $this->endSection('js') ?>