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

            <!-- carousel single -->
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-main">
                                <img src="<?php echo base_url(); ?>assets/img/promo1.png" style="width:100%; border-radius:5% ;">
                            </div>
                            <!-- * card block -->
                        </li>

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-main">
                                <img src="<?php echo base_url(); ?>assets/img/promo2.png" style="width:100%; border-radius:5% ;">
                            </div>
                            <!-- * card block -->
                        </li>


                    </ul>
                </div>
            </div>
            <!-- * carousel single -->

        </div>
        <!-- Wallet Card -->

        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">Savings (*** 5019)</option>
                                            <option value="1">Investment (*** 6212)</option>
                                            <option value="2">Mortgage (*** 5021)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addona1">$</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount"
                                        value="100">
                                    </div>
                                </div>


                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->

        <!-- Top Up Action Sheet -->
        <div class="modal fade action-sheet" id="topUp" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Top Up</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2d">Nominal</label>
                                        <select class="form-control custom-select" id="account2d">
                                            <option value="20.000">Rp. 20.000</option>
                                            <option value="50.000">Rp. 50.000</option>
                                            <option value="100.000">Rp. 100.000</option>
                                            <option value="150.000">Rp. 150.000</option>
                                            <option value="200.000">Rp. 200.000</option>
                                            <option value="250.000">Rp. 250.000</option>
                                            <option value="300.000">Rp. 300.000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Top Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Withdraw Action Sheet -->

        <!-- Send Action Sheet -->
        <div class="modal fade action-sheet" id="sendActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="text11">To</label>
                                        <input type="email" class="form-control" id="text11"
                                        placeholder="Enter User ID">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount"
                                        value="0">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Send Action Sheet -->

        <!-- Exchange Action Sheet -->
        <div class="modal fade action-sheet" id="exchangeActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Booking</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group basic">
                                            <select class="form-control custom-select" id="account2d">
                                                <option value="reguler">PS 4 / Reguler</option>
                                                <option value="nosmoking">PS 4 / No Smooking</option>
                                                <option value="100.000">Vip ps 5</option>
                                                <option value="150.000">VVIP</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group basic">
                                            <div class="input-wrapper">
                                                <label class="label" for="currency1">Tanggal</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group basic">
                                            <div class="input-wrapper">
                                                <label class="label" for="currency2">Jam</label>
                                                <input type="time" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group basic">
                                            <div class="input-wrapper">
                                                <label class="label" for="currency1">Durasi</label>
                                                <select class="form-control custom-select" id="account2d">
                                                    <option value="1">1 Jam</option>
                                                    <option value="2">2 Jam</option>
                                                    <option value="3">3 Jam</option>
                                                    <option value="4">4 Jam</option>
                                                    <option value="5">5 Jam</option>
                                                    <option value="6">6 Jam</option>
                                                    <option value="7">7 Jam</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Book</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Exchange Action Sheet -->

        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Point</div>
                        <div class="value text-success">10</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">MMR</div>
                        <div class="value text-danger">1.500</div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Time Remaining</div>
                        <div class="value">30:20</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">....</div>
                        <div class="value">....</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->


        <!-- Monthly Bills -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Tukar Point</h2>
                <a href="app-bills.html" class="link">View All</a>
            </div>
            <!-- carousel multiple -->
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/free.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">10 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">1 Jam PS4</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/free.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">15 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">1 Jam PS5</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/free.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">20 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">1 Jam VIP</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/2.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">25 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">Merchendise</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/3.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">20 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">Merchendise</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/4.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">20 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">Merchendise</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/5.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">20 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">Merchendise</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/6.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">20 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">Merchendise</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="bill-box">
                                <div class="img-wrapper">
                                    <img src="assets/img/sample/brand/7.png" alt="img" class="image-block imaged w120">
                                </div>
                                <div class="price">20 Point</div>
                                <p style="font-size: 16px; color: #ffffff;">Merchendise</p>
                                <a href="#" class="btn btn-primary btn-block btn-sm">Tukar</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->
        </div>
        <!-- * Monthly Bills -->

        <!-- Transactions -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Transactions</h2>
                <a href="app-transactions.html" class="link">View All</a>
            </div>
            <div class="transactions">

                <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        <div>
                            <strong>INV/9/0000001065</strong>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"> - 15.000</div>
                    </div>
                </a>
                <!-- * item -->
                <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        <div>
                            <strong>INV/9/0000001064</strong>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"> - 25.000</div>
                    </div>
                </a>
                <!-- * item -->
                <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        <div>
                            <strong>INV/9/0000001063</strong>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"> - 11.000</div>
                    </div>
                </a>
                <!-- * item -->
                <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        <div>
                            <strong>Deposit</strong>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-success"> + 500.000</div>
                    </div>
                </a>
                <!-- * item -->
            </div>
        </div>
        <!-- * Transactions -->

        <!-- my cards -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Promo</h2>
                <a href="app-cards.html" class="link">View All</a>
            </div>

            <!-- carousel single -->
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-block bg-primary">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="pencil-outline"></ion-icon>Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="close-outline"></ion-icon>Remove
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                                            </a>
                                        </div>
                                    </div>
                                    <div class="balance">
                                        <span class="label">Saldo</span>
                                        <h1 class="title">100.000</h1>
                                    </div>
                                    <div class="in">
                                        <div class="card-number">
                                            <span class="label">Card Number</span>
                                            •••• 9905
                                        </div>
                                        <div class="bottom">
                                            <div class="card-expiry">
                                                <span class="label">Expiry</span>
                                                12 / 25
                                            </div>
                                            <div class="card-ccv">
                                                <span class="label">CCV</span>
                                                553
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- * card block -->
                        </li>

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-block bg-dark">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="pencil-outline"></ion-icon>Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="close-outline"></ion-icon>Remove
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                                            </a>
                                        </div>
                                    </div>
                                    <div class="balance">
                                        <span class="label">BALANCE</span>
                                        <h1 class="title">$ 1,256,90</h1>
                                    </div>
                                    <div class="in">
                                        <div class="card-number">
                                            <span class="label">Card Number</span>
                                            •••• 9905
                                        </div>
                                        <div class="bottom">
                                            <div class="card-expiry">
                                                <span class="label">Expiry</span>
                                                12 / 25
                                            </div>
                                            <div class="card-ccv">
                                                <span class="label">CCV</span>
                                                553
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- * card block -->
                        </li>

                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-block bg-secondary">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="pencil-outline"></ion-icon>Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="close-outline"></ion-icon>Remove
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                                            </a>
                                        </div>
                                    </div>
                                    <div class="balance">
                                        <span class="label">BALANCE</span>
                                        <h1 class="title">$ 1,256,90</h1>
                                    </div>
                                    <div class="in">
                                        <div class="card-number">
                                            <span class="label">Card Number</span>
                                            •••• 9905
                                        </div>
                                        <div class="bottom">
                                            <div class="card-expiry">
                                                <span class="label">Expiry</span>
                                                12 / 25
                                            </div>
                                            <div class="card-ccv">
                                                <span class="label">CCV</span>
                                                553
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- * card block -->
                        </li>

                    </ul>
                </div>
            </div>
            <!-- * carousel single -->

        </div>
        <!-- * my cards -->


        <!-- News -->
        <div class="section full mt-4 mb-3">
            <div class="section-heading padding">
                <h2 class="title">Lastest News</h2>
                <a href="app-blog.html" class="link">View All</a>
            </div>

            <!-- carousel multiple -->
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">

                        <li class="splide__slide">
                            <a href="app-blog-post.html">
                                <div class="blog-card">
                                    <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w-100">
                                    <div class="text">
                                        <h4 class="title">What will be the value of bitcoin in the next...</h4>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="splide__slide">
                            <a href="app-blog-post.html">
                                <div class="blog-card">
                                    <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w-100">
                                    <div class="text">
                                        <h4 class="title">Rules you need to know in business</h4>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="splide__slide">
                            <a href="app-blog-post.html">
                                <div class="blog-card">
                                    <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w-100">
                                    <div class="text">
                                        <h4 class="title">10 easy ways to save your money</h4>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="splide__slide">
                            <a href="app-blog-post.html">
                                <div class="blog-card">
                                    <img src="assets/img/sample/photo/4.jpg" alt="image" class="imaged w-100">
                                    <div class="text">
                                        <h4 class="title">Follow the financial agenda with...</h4>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->

        </div>
        <!-- * News -->


        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Game On Application
            </div>
        </div>
        <!-- * app footer -->

    </div>
<!-- * App Capsule -->


<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="index.html" class="item active">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="app-transactions.html" class="item">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon>
            <strong>Transaction</strong>
        </div>
    </a>
    <a href="app-qr-code.html" class="item">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="qr-code-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </div>
            <strong>Pay</strong>
        </div>
    </a>
    <a href="app-cards.html" class="item">
        <div class="col">
            <ion-icon name="bar-chart-outline"></ion-icon>
            <strong>Ranks</strong>
        </div>
    </a>
    <a href="app-settings.html" class="item">
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