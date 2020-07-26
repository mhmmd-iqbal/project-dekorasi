<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Halaman Login User</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?= base_url() ?>/assets/template/main/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/main/login.css">

    <!-- Another CSS For Plugin -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/toaster/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/confirm-button/jquery-confirm.min.css">
</head>


<body>

    <div class="login-block">
        <h1>
            <a href="/"> Informasi Jasa Dekorasi Aceh</a>
        </h1>
        <form action="" id="admin-login" method="POST">
            <?= csrf_field() ?>
            <input type="text" value="" name="username" placeholder="Username" id="username" autocomplete="off" />
            <input type="password" name="password" value="" placeholder="Password" id="password" autocomplete="off" />
            <button type="submit" id="btn-submit"><i class="fa fa-refresh fa-spin" id="spin" hidden></i> <i class="fa fa-lock" id="lock"></i> Masuk</button>
        </form>
    </div>
</body>

</html>

<!-- Another Js From Outside Web -->
<script src="<?= base_url() ?>/assets/template/main/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>/assets/toaster/jquery.toast.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    const baseUrl = '<?= base_url() ?>'

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

    $('#admin-login').submit(function(e) {
        e.preventDefault();
        if (($('#username').val() == '') || ($('#password').val() == '')) {
            return toaster("Perhatian !", "Username atau Password Tidak Boleh Kosong!", "warning")
        }
        $.ajax({
            url: baseUrl + "/admin/login/validasi",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: () => {
                $('#btn-submit').attr('disabled', true)
                $('#spin').attr('hidden', false);
                $('#lock').attr('hidden', true);
            },
            success: (res) => {
                if (res.error === true) {
                    toaster("Perhatian !", "Username atau Password Tidak Sesuai!", "error")
                    $('#btn-submit').attr('disabled', false)
                    $('#spin').attr('hidden', true);
                    $('#lock').attr('hidden', false);
                    $(this).trigger('reset');
                } else {
                    toaster("Berhasil !", "Anda Berhasil Login", "success")
                    window.location.href = baseUrl + '/login/redirect';
                }
            }
        });
    });
</script>