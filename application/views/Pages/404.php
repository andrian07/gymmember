<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }
    .listview > li {
        position: inherit !important;
    }
    h1 {
        font-size: 37px;
        font-weight: 700;
        margin-top: 35px;
        color: #6236FF;
    }
</style>
<body style="background-color:#ffffff;">

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Page Not Found
        </div>
    </div>
    <div id="appCapsule">
        <div class="section">
            <div class="splash-page mt-5 mb-5">
                <h1>404</h1>
                <h2 class="mb-2">Page not found!</h2>
                <p>
                    Halaman Tidak Di Temukan / Jaringan Sedang Bermasalah.
                </p>
            </div>
        </div>

        <div class="fixed-bar">
            <div class="row">
                <div class="col-6">
                    <a href="#" class="btn btn-lg btn-outline-secondary btn-block goBack">Go Back</a>
                </div>
                <div class="col-6">
                    <a href="" id="tryagain" class="btn btn-lg btn-primary btn-block">Try Again</a>
                </div>
            </div>
        </div>
    </div>
    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer2');
    ?>
  <script>
    $('#tryagain').click(function(e) {
        e.preventDefault();  // Prevent default link behavior
        window.location.reload();  // Refresh the page
    });
</script>
</body>
</html>
