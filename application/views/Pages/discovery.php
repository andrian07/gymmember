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
            Discovery
        </div>
    </div>

    <div class="extraHeader pe-0 ps-0">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#waiting" role="tab">
                    Class
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#paid" role="tab">
                    Personal Trainer
                </a>
            </li>
        </ul>
    </div>


    <div id="appCapsule" class="extra-header-active full-height">

        <div class="section tab-content mt-2 mb-1">

            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">
                    <ul class="listview image-listview media">
                        <?php foreach($data['class_data'] as $row){ ?>
                            <li>
                                <a href="#" class="item">
                                    <div class="in">
                                        <div>
                                            <?php echo $row['class_name']; ?>
                                            <div class="text-muted" style="margin-top:10px;"><ion-icon name="time-outline"></ion-icon> 16:00 - 17:00</div>
                                            <div class="text-muted" style="margin-top:5px;"><ion-icon name="location-outline"></ion-icon> Elluna Gym & Sports</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- * waiting tab -->



            <!-- paid tab -->
            <div class="tab-pane fade" id="paid" role="tabpanel">
                <div class="row">
                    <div class="col-6 mb-2">
                        <div class="bill-box">
                            <div class="img-wrapper">
                                <img src="assets/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                            </div>
                            <div class="price">$ 14</div>
                            <p>Prime Monthly Subscription</p>
                            <a href="#" class="btn btn-primary btn-block btn-sm">DETAIL</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * paid tab -->

        </div>

    </div>



    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
    <script>
    // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

</body>

</html>