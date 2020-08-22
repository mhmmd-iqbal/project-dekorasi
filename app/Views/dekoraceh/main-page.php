<!DOCTYPE html>
<html lang="en">

<?= $this->include('dekoraceh/main-header') ?>

<body>
    <?= $this->include('dekoraceh/main-preload') ?>
    <?= $this->include('dekoraceh/main-menubar') ?>
    <?= $this->renderSection('konten') ?>
    <?= $this->include('dekoraceh/main-footer') ?>
    <?= $this->include('dekoraceh/main-script') ?>
</body>

</html>