<!-- Vendor JS Files -->
<script src="<?= base_url() ?>/assets/template/main/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>/assets/template/main/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>/assets/template/main/js/main.js"></script>

<!-- ORIGINAL SCRIPT  -->
<?= $this->renderSection('js') ?>

<!-- Login Script Go Here -->
<script>
    $('#button-login-submit').click(function(e) {
        e.preventDefault();
        $('#form-login').trigger('submit');
    });

    $('#form-login').submit(function(e) {
        e.preventDefault();
        $('#button-login-submit').attr('disabled', true);
        $('#fa-login-submit').attr('hidden', false);
        $('#fa-login-logo').attr('hidden', true);
    });
</script>