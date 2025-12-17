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

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <h2 style="color: #ffffff;">Elluna Gym</h2>
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
            <a href="app-settings.html" class="headerButton">
                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged w32">
                <span class="badge badge-danger">6</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Hello, <?php echo $_SESSION['user_name']; ?></h2>
            </div>

            <a href="<?php echo base_url();?>User/setting">
                <div id="toast-3" class="toast-box toast-top show">
                    <div class="in">
                        <ion-icon name="people-outline" class="text-info md hydrated" role="img"></ion-icon>
                        <div class="text">
                            Data Anda Belum Lengkap Silahakn Lengkapi Dahulu
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-text-danger close-button">Open</button>
                </div>
            </a>
            <!-- carousel single -->
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-main">
                                <img src="<?php echo base_url(); ?>assets/img/banner/f02df848-5033-49bd-9fab-bd3701bba8a4.webp" style="width:100%; border-radius:5% ;">
                            </div>
                            <!-- * card block -->
                        </li>

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-main">
                                <img src="<?php echo base_url(); ?>assets/img/banner/abb349f2-c4dc-4d6a-a7e1-8358c802a947.webp" style="width:100%; border-radius:5% ;">
                            </div>
                            <!-- * card block -->
                        </li>

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-main">
                                <img src="<?php echo base_url(); ?>assets/img/banner/900548a9-5ca1-4dbb-ae28-2198717b3eb4.webp" style="width:100%; border-radius:5% ;">
                            </div>
                            <!-- * card block -->
                        </li>


                    </ul>
                </div>
            </div>
            <!-- * carousel single -->

        </div>
        <!-- Wallet Card -->
        <!-- Transactions -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Today's Daily Class</h2>
                <a href="app-transactions.html" class="link">View All</a>
            </div>
            <ul class="listview image-listview media">
                <?php foreach($data['today_class_data'] as $row){ ?>
                    <li>
                        <a href="#" class="item">
                            <div class="imageWrapper">
                                <img src="http://localhost/gym/assets/class/<?php echo $row['class_image']; ?>" alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    <?php echo $row['class_name'].' / '. $row['coach_name']; ?>
                                    <div class="text-muted">
                                        <?php 
                                        $datetime = $row['schedule_time_start'];
                                        echo 'Jam: '.date('H:i', strtotime($datetime));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- * Transactions -->

        <!-- Monthly Bills -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Explore Classes</h2>
                <a href="app-bills.html" class="link">View All</a>
            </div>
            <!-- carousel multiple -->
            <div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
                <div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
                    <ul class="splide__list" id="splide03-list" style="transform: translateX(-987px);">
                        <?php foreach($data['class_data'] as $row){ ?>
                            <li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                                <div class="card bg-dark text-white" style="text-align:center;">
                                    <img src="http://localhost/gym/assets/class/<?php echo $row['class_image']; ?>" alt="image" class="card-img overlay-img" style="height: 130px;">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title"><?php echo $row['class_name']; ?></h5>
                                        <!-- <p class="card-text"><small>Last updated 3 mins ago</small></p> -->
                                        <p>Easy. 60 Min</p>
                                        <a href="#" class="btn btn-primary btn-block btn-sm">Join</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->
        </div>
        <!-- * Monthly Bills -->

        <!-- PT -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Personal Trainer</h2>
                <a href="app-bills.html" class="link">View All</a>
            </div>
            <!-- carousel multiple -->
            <div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
                <div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
                    <ul class="splide__list" id="splide03-list" style="transform: translateX(-987px);">
                        <?php foreach($data['pt_data'] as $row){ ?>
                            <li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                                <div class="card bg-dark text-white">
                                    <img src="http://localhost/gym/assets/pt/<?php echo $row['coach_image']; ?>" alt="image" class="card-img overlay-img" style="height: 130px; width: 184px;">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title"><?php echo $row['coach_name']; ?></h5>
                                        <!-- <p class="card-text"><small>Last updated 3 mins ago</small></p> -->
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->
        </div>
        <!-- * PT -->




        <!-- app footer -->
        <div class="appFooter" style="margin-top:20px;">
            <div class="footer-title">
                Elluna Application
            </div>
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->



    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
    <script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
</script>

</body>

</html>