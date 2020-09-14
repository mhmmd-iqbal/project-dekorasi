<?= $this->extend('admin/admin-template') ?>
<?= $this->section('konten') ?>

<div class="row">
   <div class="col-md-12">
      <div role="tabpanel">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
               <a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Profile</a>
            </li>
            <li role="presentation">
               <a href="#logo" aria-controls="tab" role="tab" data-toggle="tab">Logo</a>
            </li>
         </ul>

         <!-- Tab panes -->
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="profile">...</div>
            <div role="tabpanel" class="tab-pane" id="logo">...</div>
         </div>
      </div>
   </div>

</div>


<?= $this->endSection('konten') ?>