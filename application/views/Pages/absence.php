<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }
</style>
<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?php echo base_url(); ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            QR Code
        </div>
    </div>
    <!-- * App Header -->


    <div id="appCapsule">
        <div class="section">
            <div class="splash-page mt-5 mb-5">
                <?php foreach($data['my_member'] as $row){ ?>
                <div class="mb-3">
                    <img src="<?php echo base_url(); ?>assets/qrcode/<?php echo $row['member_qr']; ?>" alt="QR Code" class="imaged square w140">
                </div>
                <?php } ?>
                <h2 class="mb-2">Scan the QR Code</h2>
                <p>
                    Silahkan Scan Di Bagian Admin Untuk Melakukan Absensi Kehadiran
                </p>
            </div>
        </div>
    </div>
<!-- App Sidebar -->
<?php 
require DOC_ROOT_PATH . $this->config->item('footer1');
?>
<script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
</script>

</body>

</html>