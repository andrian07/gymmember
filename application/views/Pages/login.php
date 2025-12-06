<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?php echo base_url() ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <img src="<?php echo base_url() ?>assets/img/logo.png" style="width: 30%; margin-bottom:20px ;">
            <h1>Log in</h1>
            <h4>Elluna Gym Member</h4>
        </div>
        <div class="section mb-5 p-2">

            <form action="index.html">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">No HP</label>
                                <input type="number" class="form-control" id="member_phone" placeholder="No HP">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="member_password" placeholder="Password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="<?php echo base_url() ?>Register">Register Now</a>
                    </div>
                    <div><a href="<?php echo base_url() ?>Register/forgetpass" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="button" onclick="dashboard()" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->

    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');


    ?>
    <script>
        function dashboard()
        {
            window.location.href = "<?php echo base_url(); ?>dashboard";
        }
    </script>
