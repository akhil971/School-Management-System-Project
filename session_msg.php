<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (isset($_SESSION['web_msg'])) { ?>
            swal({
                title: 'MG TRADING ACADEMY',
                text: '<?php echo htmlspecialchars($_SESSION['web_msg']); ?>',
                icon: 'success',
                buttons: false,
                timer: 2500
            });
            <?php unset($_SESSION['web_msg']); ?>
        <?php } elseif (isset($_SESSION['web_err_msg'])) { ?>
            swal({
                title: 'Oops!',
                text: '<?php echo htmlspecialchars($_SESSION['web_err_msg']); ?>',
                icon: 'error',
                buttons: false,
                timer: 2500
            });
            <?php unset($_SESSION['web_err_msg']); ?>
        <?php } ?>
    });
</script>
