<?= $this->extend('user/user-template') ?>
<?= $this->section('konten') ?>
<div class="row state-overview">
    <div class="col-lg-12">
        <h4 style="font-weight: bold; text-align:right; font-style:italic"><img src="<?= base_url() ?>/assets/logo/<?= $user->company_logo ?>" alt="" id="logo" style="max-height: 22px; padding-right: 20px"><?= $user->company_name ?></h4>
    </div>
    <div class="col-lg-12">
    </div>
</div>
<?= $this->endSection('konten') ?>

<?= $this->section('js') ?>

<?= $this->endSection('js') ?>