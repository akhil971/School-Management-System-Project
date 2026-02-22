<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (!empty($webMsg)) { ?>
            swal({
                title: 'My Project',
                text: '<?php echo htmlspecialchars($webMsg); ?>',
                icon: 'success',
                buttons: false,
                timer: 5000
            });
        <?php } else if (!empty($webErrMsg)) { ?>
            swal({
                title: 'Opps!',
                text: '<?php echo htmlspecialchars($webErrMsg); ?>',
                icon: 'error',
                buttons: false,
                timer: 5000
            });
        <?php } ?>
    });
</script>