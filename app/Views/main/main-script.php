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

<!-- Another Js From Outside Web -->
<script src="<?= base_url() ?>/assets/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>/assets/toaster/jquery.toast.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="<?= base_url() ?>/assets/owncarousel/own.carousel.min.js"></script>
<script>
    function notif(title, text, icon) {
        swal({
            title: title,
            text: text,
            icon: icon,
            buttons: false,
            timer: 1500,
        });
    }

    function loading() {
        swal({
            title: "Memeriksa...",
            text: "Sedang diproses. Harap menunggu...",
            icon: baseUrl + "/assets/sweetalert/loader.gif",
            button: false,
        });
    }

    function toaster(head, text, icon) {
        $.toast({
            text: text, // Text that is to be shown in the toast
            heading: head, // Optional heading to be shown on the toast
            icon: icon, // Type of toast icon
            showHideTransition: 'plain', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 4000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'top-right',


            textAlign: 'left', // Text alignment i.e. left, right or center
            loader: false, // Whether to show loader or not. True by default
            loaderBg: '#9EC600', // Background color of the toast loader
            beforeShow: function() {}, // will be triggered before the toast is shown
            afterShown: function() {}, // will be triggered after the toat has been shown
            beforeHide: function() {}, // will be triggered before the toast gets hidden
            afterHidden: function() {} // will be triggered after the toast has been hidden
        });
    }
</script>

<!-- ORIGINAL SCRIPT  -->
<?= $this->renderSection('js') ?>

<!-- Login Script Go Here -->
<script>
    const baseUrl = '<?= base_url() ?>'
    $('#open-modal-login').click(function(e) {
        e.preventDefault();
        $('#modal-login').modal('toggle');
    });
    $('#button-login-submit').click(function(e) {
        e.preventDefault();
        $('#form-login').trigger('submit');
    });

    $('#form-login').submit(function(e) {
        e.preventDefault();
        if (($('#login-username').val() == '') || ($('#login-pass').val() == '')) {
            return toaster("Perhatian !", "Username atau Password Tidak Boleh Kosong!", "warning")
        }
        $.ajax({
            url: baseUrl + "/login/validasi",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: () => {
                $('#button-login-submit').attr('disabled', true);
                $('#fa-login-submit').attr('hidden', false);
                $('#fa-login-logo').attr('hidden', true);
            },
            success: (res) => {
                console.table(res);
                if (res.error === true) {
                    toaster("Perhatian !", "Username atau Password Tidak Sesuai!", "error")
                    $('#button-login-submit').attr('disabled', false);
                    $('#fa-login-submit').attr('hidden', true);
                    $('#fa-login-logo').attr('hidden', false);
                    $(this).trigger('reset');
                } else {
                    toaster("Berhasil !", "Anda Berhasil Login", "success")
                    window.location.href = baseUrl + '/login/redirect';
                }
            }
        });

    });
    $('#login-username').on('keypress', function(e) {
        if (e.keyCode === 13) {
            $('#form-login').trigger('submit');
        }
    });
    $('#login-password').on('keypress', function(e) {
        if (e.keyCode === 13) {
            $('#form-login').trigger('submit');
        }
    });
</script>