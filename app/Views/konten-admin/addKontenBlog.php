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
<?= $this->section('konten') ?>
<div class="row">
   <div class="col-md-12" style="padding-bottom: 10px;">
      <a href="/sys/blog" class="btn btn-info"><i class="fa fa-chevron-left"></i> Back</a>
   </div>
</div>
<div class="row state-overview">
   <div class="col-md-12">
      <div class="panel">
         <div class="panel-heading">
            <h4>Tambah Konten Blog</h4>
         </div>
         <div class="panel-body">
            <form action="" id="">
               <div class="row form-group ">
                  <div class="col-md-2"><label for="">Konten</label></div>
                  <div class="col-md-10">
                     <textarea name="" id="" cols="30" rows="10" class="summernote"></textarea>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection('kontem') ?>

<?= $this->section('js') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
   $(document).ready(function() {
      $('.summernote').summernote({
         tabsize: 2,
         height: 400
      });
   });
   $(".sub__blog").removeClass("active");
   $("#konten_blog").addClass("active");

   // $('#submit-form').submit(function(e) {
   //    e.preventDefault()
   //    var post_url = $(this).attr("action"); //get form action url
   //    var request_method = $(this).attr("method"); //get form GET/POST method
   //    var form_data = new FormData(this)
   //    $.ajax({
   //       url: post_url,
   //       type: request_method,
   //       data: form_data,
   //       cache: false,
   //       contentType: false,
   //       processData: false,
   //       beforeSend: () => {
   //          loading()
   //          $('#load_umum_show').attr('hidden', false)
   //          $('#load_umum_hide').attr('hidden', true)
   //       },
   //       success: (res) => {
   //          swal.close()
   //          $('#load_umum_show').attr('hidden', true)
   //          $('#load_umum_hide').attr('hidden', false)
   //          if (res.status === true) {
   //             toaster("Berhasil", "Data Telah Disimpan", "success")
   //             $('#cover-image').prop('src', '#')
   //             $(this).trigger("reset");
   //             $("#modal-form").modal("toggle");
   //             showData()
   //          } else {
   //             toaster("Gagal", "Data Gagal Disimpan", "error")
   //          }
   //       },
   //       error: function(xhr, status, error) {
   //          console.log(xhr.responseText)
   //          swal.fire({
   //             title: "Error : " + xhr.status,
   //             text: xhr.statusText,
   //             icon: "error",
   //             showConfirmButton: false,
   //             timer: 1500
   //          });
   //       }
   //    })
   // });
</script>
<?= $this->endSection('js') ?>