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
                <h2 class="title">Hello, Adrian</h2>
                <a href="app-cards.html" class="link">View All</a>
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



        <!-- Monthly Bills -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Today's Classes</h2>
                <a href="app-bills.html" class="link">View All</a>
            </div>
            <!-- carousel multiple -->
            <div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
                <div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
                    <ul class="splide__list" id="splide03-list" style="transform: translateX(-987px);">

                        <li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 1</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 2</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 3</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 4</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide" id="splide03-slide01" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 1</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide is-visible is-active" id="splide03-slide02" style="margin-right: 16px; width: 191px;" aria-hidden="false" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 2</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide is-visible" id="splide03-slide03" style="margin-right: 16px; width: 191px;" aria-hidden="false" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 3</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide" id="splide03-slide04" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 4</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li>

                    <li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 1</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 2</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 3</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li><li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Title 4</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title.
                                    </p>
                                </div>
                            </div>
                        </li></ul>
                </div>
            </div>
            <!-- * carousel multiple -->
        </div>
        <!-- * Monthly Bills -->

        <!-- Transactions -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Personal Trainer</h2>
                <a href="app-transactions.html" class="link">View All</a>
            </div>
            <div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
                <div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
                    <ul class="splide__list" id="splide03-list" style="transform: translateX(-1385px);">

                        <li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 191px;">
                            <div class="card" style="background:none;box-shadow: none;">
                                <div class="card-body">
                                    <p>
                                        <img src="https://thewebmax.org/zymmy/images/team/pic1.jpg" alt="image" class="imaged w120 rounded">
                                    </p>
                                    <h5 class="card-title" style="text-align:center;">Edith J. Shuster</h5>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 191px;">
                            <div class="card" style="background:none;box-shadow: none;">
                                <div class="card-body">
                                    <p>
                                        <img src="https://thewebmax.org/zymmy/images/team/pic2.jpg" alt="image" class="imaged w120 rounded">
                                    </p>
                                    <h5 class="card-title" style="text-align:center;">Terry Jackson</h5>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 191px;">
                            <div class="card" style="background:none;box-shadow: none;">
                                <div class="card-body">
                                    <p>
                                        <img src="https://thewebmax.org/zymmy/images/team/pic3.jpg" alt="image" class="imaged w120 rounded">
                                    </p>
                                    <h5 class="card-title" style="text-align:center;">John L. Diaz</h5>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="margin-right: 16px; width: 191px;">
                            <div class="card" style="background:none;box-shadow: none;">
                                <div class="card-body">
                                    <p>
                                        <img src="https://thewebmax.org/zymmy/images/team/pic3.jpg" alt="image" class="imaged w120 rounded">
                                    </p>
                                    <h5 class="card-title" style="text-align:center;">Gabriel Wood</h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- * Transactions -->


        <!-- Transactions -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Trending Today's</h2>
                <a href="app-transactions.html" class="link">View All</a>
            </div><ul class="listview image-listview media">
                <li>
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                Sonic Yoga
                                <div class="text-muted">subtext</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                21 Pilates
                                <div class="text-muted">subtext</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                Striking Class
                                <div class="text-muted">subtext</div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- * Transactions -->

        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Elluna Application
            </div>
        </div>
        <!-- * app footer -->

    </div>
<!-- * App Capsule -->


<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="<?php echo base_url(); ?>Dashboard" class="item">
        <div class="col" >
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="app-transactions.html" class="item">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon>
            <strong>Class</strong>
        </div>
    </a>
    <a href="<?php echo base_url(); ?>User/absence" class="item">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="qr-code-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </div>
            <strong>Absen</strong>
        </div>
    </a>
    <a href="app-cards.html" class="item">
        <div class="col">
            <ion-icon name="bar-chart-outline"></ion-icon>
            <strong>Video</strong>
        </div>
    </a>
    <a href="<?php echo base_url(); ?>User/setting" class="item active">
        <div class="col">
            <ion-icon name="settings-outline"></ion-icon>
            <strong>Settings</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->

<!-- App Sidebar -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <!-- profile box -->
                <div class="profileBox pt-2 pb-2">
                    <div class="image-wrapper">
                        <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged  w36">
                    </div>
                    <div class="in">
                        <strong>Adrian</strong>
                        <div class="text-muted">4029209</div>
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <!-- * profile box -->
                <!-- balance -->
                <div class="sidebar-balance">
                    <div class="listview-title">Balance</div>
                    <div class="in">
                        <h1 class="amount">100.000</h1>
                    </div>
                </div>
                <!-- * balance -->



                <!-- menu -->
                <div class="listview-title mt-1">Menu</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="index.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Home
                                <span class="badge badge-primary">10</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-pages.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Transaction
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-components.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="apps-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Components
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-cards.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Cards
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- * menu -->

                <!-- others -->
                <div class="listview-title mt-1">Others</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="app-settings.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="settings-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Settings
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="component-messages.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Support
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-login.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Log out
                            </div>
                        </a>
                    </li>


                </ul>
                <!-- * others -->


            </div>
        </div>
    </div>
</div>
<!-- * App Sidebar -->



<!-- iOS Add to Home Action Sheet -->
<div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add to Home Screen</h5>
                <a href="#" class="close-button" data-bs-dismiss="modal">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content text-center">
                    <div class="mb-1"><img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                    </div>
                    <div>
                        Install <strong>Finapp</strong> on your iPhone's home screen.
                    </div>
                    <div>
                        Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- * iOS Add to Home Action Sheet -->


<!-- Android Add to Home Action Sheet -->
<div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add to Home Screen</h5>
            <a href="#" class="close-button" data-bs-dismiss="modal">
                <ion-icon name="close"></ion-icon>
            </a>
        </div>
        <div class="modal-body">
            <div class="action-sheet-content text-center">
                <div class="mb-1">
                    <img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                </div>
                <div>
                    Install <strong>Finapp</strong> on your Android's home screen.
                </div>
                <div>
                    Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- * Android Add to Home Action Sheet -->

<?php 
require DOC_ROOT_PATH . $this->config->item('footer1');
?>
<script>
    // Add to Home with 2 seconds delay.
    AddtoHome("2000", "once");
</script>

</body>

</html>