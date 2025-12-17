<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="<?php echo base_url(); ?>Dashboard" class="item active" id="home">
        <div class="col" >
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="<?php echo base_url(); ?>Discovery" class="item" id="discovery">
        <div class="col">
            <ion-icon name="book-outline"></ion-icon>
            <strong>Discovery</strong>
        </div>
    </a>
    <a href="<?php echo base_url(); ?>User/absence" class="item" id="absen">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="qr-code-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </div>
            <strong>Absen</strong>
        </div>
    </a>
    <a href="app-cards.html" class="item" id="membership">
        <div class="col">
            <ion-icon name="people-outline"></ion-icon>
            <strong>Membership</strong>
        </div>
    </a>
    <a href="<?php echo base_url(); ?>User/setting" class="item" id="setting">
        <div class="col">
            <ion-icon name="person-circle-outline"></ion-icon>
            <strong>Me</strong>
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
                        <a href="<?php echo base_url(); ?>Dashboard" class="item">
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
                        <a href="<?php echo base_url(); ?>Discovery" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Discovery
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


<?php /*
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
*/ ?>

<!-- ========= JS Files =========  -->
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/js/lib/bootstrap.bundle.min.js"></script>
<!-- Ionicons -->
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
<!-- Splide -->
<script src="<?php echo base_url() ?>assets/js/plugins/splide/splide.min.js"></script>
<!-- Base Js File -->
<script src="<?php echo base_url() ?>assets/js/base.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});

    var controllerName = "<?= $this->router->fetch_class(); ?>";
    if(controllerName == 'Dashboard'){
        $('#home').addClass('active');
        $('#discovery').removeClass('active');
        $('#absen').removeClass('active');
        $('#membership').removeClass('active');
        $('#setting').removeClass('active');
    }
    else if(controllerName == 'Discovery')
    {
        $('#home').removeClass('active');
        $('#discovery').addClass('active');
        $('#absen').removeClass('active');
        $('#membership').removeClass('active');
        $('#setting').removeClass('active');
    }
    else if(controllerName == 'membership')
    {
        $('#home').removeClass('active');
        $('#discovery').removeClass('active');
        $('#absen').removeClass('active');
        $('#membership').addClass('active');
        $('#setting').removeClass('active');
    }
    else if(controllerName == 'setting')
    {
        $('#home').removeClass('active');
        $('#discovery').removeClass('active');
        $('#absen').removeClass('active');
        $('#membership').removeClass('active');
        $('#setting').addClass('active');
    }
    else if(controllerName == 'absence')
    {
        $('#home').removeClass('active');
        $('#discovery').removeClass('active');
        $('#absen').removeClass('active');
        $('#membership').removeClass('active');
        $('#setting').removeClass('active');
    }

</script>

</body>

</html>