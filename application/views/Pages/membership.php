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
            Membership
        </div>
    </div>
    <div id="appCapsule" class="extra-header-active full-height">
        <div class="section mt-4" style="margin-top:-40px !important;">
            <div class="card">
                <div class="card-body" style="height: 120px;">
                    <div class="form-group basic p-0">
                        <?php if($data['my_package'] == null){ ?>
                            <div class="exchange-group" style="text-align:center;">
                                <div class="input-col">
                                    <h2 class="title" style="font-size:15px;">No memberships purchase yet</h2>
                                    <p style="font-size: 12px; line-height: 16px;">If you have already purchased any <br />membership will appear here</p>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>

            <h2 class="title" style="font-size:15px; margin-top: 40px;">Discover Membership That Fit You!</h2>

            <p style="font-size: 12px; line-height: 16px;">Various memberships that enable you to use your <br />points on all products with special price on bookings</p>

            <span class="badge badge-dark">Gym Package</span>

            <div class="row" style="margin-top: 20px;">

                <?php foreach($data['gym_package_member'] as $row){ ?>
                    <div class="col-6 mb-2">
                        <a href="app-blog-post.html">
                            <div class="blog-card">
                                <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w-100">
                                <div class="text">
                                    <h4 class="title">Enjoy your fitness in 4 Month Package with Elluna Gym</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
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