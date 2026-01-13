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
            <h2 style="color: #ffffff; margin-top: 10px;">Elluna Gym</h2>
        </div>
        <?php if (!empty($_SESSION['user_name']) && $data['cookies'] != 0) { ?>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
            <!-- PWA install button (hidden until beforeinstallprompt fires) -->
            <button type="button" id="btn-install" class="headerButton" style="display:none; border:0; background:transparent; color:#fff;">
                <ion-icon name="download-outline"></ion-icon>
            </button>
        </div>
        <?php } ?>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <?php if (empty($_SESSION['user_name'])) { ?>
                    <h2 class="title">Hello, Guest</h2>
                <?php }else{ ?>
                    <?php if($data['cookies'] == 0){ ?>
                    <h2 class="title">Hello, Guest</h2>
                <?php } else { ?>
                    <h2 class="title">Hello, <?php echo htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <?php  }} ?>
            </div>
            <?php if (empty($_SESSION['user_name']) || $data['cookies'] == 0) { ?>
                <a href="<?php echo base_url();?>Register">
                    <div id="toast-3-login" class="toast-box toast-top show">
                        <div class="in">
                            <ion-icon name="person-circle-outline" class="text-info md hydrated" role="img"></ion-icon>
                            <div class="text">
                                Silahkan Login/Register Untuk Mendapatkan Pengalaman Terbaik
                            </div>
                        </div>
                        <button type="button" id="tologin" class="btn btn-sm btn-text-danger close-button">Register</button>
                    </div>
                </a>
            <?php }else{ ?>
            <?php if($data['my_data'] == 'N'){ ?>
                <a href="<?php echo base_url();?>Setting/update_data">
                    <div id="toast-3" class="toast-box toast-top show">
                        <div class="in">
                            <ion-icon name="people-outline" class="text-info md hydrated" role="img"></ion-icon>
                            <div class="text">
                                Data Anda Belum Lengkap Silahakn Lengkapi Dahulu
                            </div>
                        </div>
                        <button type="button" id="updatedata" class="btn btn-sm btn-text-danger close-button">Open</button>
                    </div>
                </a>
            <?php }} ?>
            <!-- carousel single -->
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach($data['banner_data'] as $row){ ?>
                            <li class="splide__slide">
                                <!-- card block -->
                                <div class="card-main">
                                    <img src="<?= $this->config->item('image_url'); ?>banner/<?php echo $row['banner_image']; ?>" style="width:100%; border-radius:5% ;">
                                </div>
                                <!-- * card block -->
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- * carousel single -->

        </div>
        <!-- Wallet Card -->
        <!-- Today Class -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Kelas Hari Ini</h2>
            </div>
            <?php if($data['today_class_data'] == null){ ?>
                <ul class="listview image-listview media" style="background:none; border: none;">
            <?php }else{ ?>
                <ul class="listview image-listview media">
            <?php } ?>
                <?php if($data['today_class_data'] == null){ ?>
                    <li>
                        <div class="in" style="text-align:center;">
                            <div>
                                <strong>No Classes Today</strong>
                                <div class="text-muted">Please check back later for upcoming classes.</div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                <?php foreach($data['today_class_data'] as $row){ ?>
                    <li>
                        <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogIconedButtonInline" data-id="<?php echo $row['class_id']; ?>" data-scheduleid="<?php echo $row['schedule_class_id']; ?>" data-name="<?php echo $row['class_name']; ?>" data-price="<?php echo $row['class_price_day']; ?>" data-time="<?php echo $row['schedule_time_start']; ?>">
                            <div class="imageWrapper">
                                <img src="<?= $this->config->item('image_url'); ?>class/<?php echo $row['class_image']; ?>" alt="image" class="imaged" style="height: 60px; width: 60px; object-fit: cover;">
                            </div>
                            <div class="in">
                                <div>
                                    <?php echo $row['class_name'].' / '. $row['coach_name']; ?>
                                    <div>
                                        <?php 
                                        $datetime = $row['schedule_time_start'];
                                        echo 'Jam: '.date('H:i', strtotime($datetime));
                                        ?>
                                    </div>
                                    <div>
                                        <span class="badge badge-info"><?php echo 'Rp '.number_format($row['class_price_day'],0,',','.'); ?></span>     
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <!-- Dialog Block Button -->
            <div class="modal fade dialogbox" id="DialogIconedButtonInline" data-bs-backdrop="static" tabindex="-1"
            role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <div class="btn-inline">
                                <input type="hidden" id="class_id" />
                                <input type="hidden" id="schedule_class_id" />
                                <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal">
                                    CANCEL
                                </a>
                                <a href="#" id="joindailyclass" class="btn btn-text-success" >
                                    JOIN
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- * Dialog Block Button -->
        <div class="modal fade dialogbox" id="ErrorBookDaily" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <div class="modal-icon text-info">
                        <ion-icon name="information-circle-outline"></ion-icon>
                    </div>
                    <div class="modal-body" id="error-message">
                    </div>
                    <?php if (!empty($_SESSION['user_name']) && $data['cookies'] != 0) { ?>
                    <div class="modal-body" id="error-message-2">
                    </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Dialog Block Button -->
        </div>
        <!-- * Today Class -->
        <!-- explore class -->
        <div class="section full mt-4">       
            <div class="section-heading padding">
                <h2 class="title">Explore Kelas</h2>
                <a href="<?php echo base_url(); ?>Discovery" class="link">View All</a>
            </div>
            <!-- carousel multiple -->
            
            <div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
                <div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
                    <ul class="splide__list" id="splide03-list" style="transform: translateX(-987px);">
                        <?php foreach($data['class_data'] as $row){ ?>
                                <li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                                    <a href="<?php echo base_url(); ?>Discovery/detailclass?id=<?php echo $row['class_id']; ?>">
                                    <div class="card bg-dark text-white" style="text-align:center;">
                                        <img src="<?= $this->config->item('image_url'); ?>class/<?php echo $row['class_image']; ?>" alt="image" class="card-img overlay-img" style="height: 130px;">
                                        <!-- <div class="card-img-overlay">
                                            <h5 class="card-title"><?php echo $row['class_name']; ?></h5>
                                            <p class="card-text"><small>Easy. 60 Min</small></p>
                                            <a href="#" class="btn btn-primary btn-block btn-sm" style="width: 50%;">Book</a>
                                        </div> -->
                                    </div>
                                    </a>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->
        </div>
        <!-- * explore class -->

        <!-- PT -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">Personal Trainer</h2>
                <a href="<?php echo base_url(); ?>Discovery" class="link">View All</a>
            </div>
            <!-- carousel multiple -->
            <div class="carousel-multiple splide splide--loop splide--ltr splide--draggable is-active" id="splide03" style="visibility: visible;">
                <div class="splide__track" id="splide03-track" style="padding-left: 16px; padding-right: 16px;">
                    <ul class="splide__list" id="splide03-list" style="transform: translateX(-987px);">
                        <?php foreach($data['pt_data'] as $row){ ?>
                            <li class="splide__slide splide__slide--clone" style="margin-right: 16px; width: 191px;" aria-hidden="true" tabindex="-1">
                                <a href="<?php echo base_url(); ?>Discovery/detailpt?id=<?php echo $row['coach_id']; ?>">
                                    <div class="card bg-dark text-white">
                                        <img src="<?= $this->config->item('image_url'); ?>pt/<?php echo $row['coach_image']; ?>" alt="image" class="card-img overlay-img" style="height: 130px; width: 184px;">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title"><?php echo $row['coach_name']; ?></h5>
                                            <!-- <p class="card-text"><small>Last updated 3 mins ago</small></p> -->
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->
        </div>
        <!-- * PT -->        
        <button type="button" id="btn-install" class="headerButton" style="border:0; background:transparent; color:#fff;">
            <ion-icon name="download-outline"></ion-icon>
        </button>
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
    //AddtoHome("2000", "once");

    $('#updatedata').on('click', function () {
        window.location.href = '<?php echo base_url();?>Setting/update_data';
    });

    $('#tologin').on('click', function (e) {
        e.preventDefault();
        window.location.href = '<?php echo base_url();?>Register';
    });



    window.addEventListener('appinstalled', function(evt) {
        console.log('PWA was installed.');
        $btnInstall.hide();
    });

    // Auto-hide the guest/update toast after 10 seconds
    setTimeout(function() {
        var $toast = $('#toast-3-login');
        if ($toast.length) {
            $toast.fadeOut(400, function() { $(this).remove(); });
        }
    }, 5000);


    $('#DialogIconedButtonInline').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget); // trigger
        var id = button.data('id');
        var scheduleid = button.data('scheduleid');
        var name = button.data('name');
        var price = button.data('price');
        var time = button.data('time');
        var modal = $(this);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var currentDate = dd + '-' + mm + '-' + yyyy;
        modal.find('#class_id').val(id);   
        modal.find('#schedule_class_id').val(scheduleid);
        modal.find('.modal-title').text('Join ' + name + ' Class');
        modal.find('.modal-body').html('Apakah Anda Ingin Bergabung dengan ' + name + ' Class <br>  Tanggal:' + currentDate + ' <br > Jam: <b>' + time + '</b> <br />  Biaya <b>Rp ' + price.toLocaleString('id-ID') + '</b>?');
    });

    $('#joindailyclass').click(function(e){
        e.preventDefault();
        var class_id             = $("#class_id").val();
        var schedule_class_id    = $("#schedule_class_id").val();  
        let csrfName             = $('meta[name=csrf-name]').attr('content');
        let csrfHash             = $('meta[name=csrf-hash]').attr('content');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Book/bookdailyclass",
            dataType: "json",   
            data: {
                [csrfName]: csrfHash,    // kirim CSRF DINAMIS
                class_id:class_id,
                schedule_class_id:schedule_class_id
            },                                                               
            success : function(data){
                if (data.csrf_name && data.csrf_hash) {
                    $('meta[name=csrf-name]').attr('content', data.csrf_name);
                    $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                }            
                if (data.code == "200"){
                    window.location.href = "<?php echo base_url(); ?>Payment/transferpage?id=" + data.transaction_register_id + "&category=memberclass";
                }else{
                    $('#error-message').text(data.message);
                    $('#error-message-2').html('<a href="<?php echo base_url(); ?>History">Lihat Info Transaksi</a>');
                    $('#ErrorBookDaily').modal('show');
                    $('#DialogIconedButtonInline').modal('hide');
                }
            }
        });
    });
</script>

</body>

</html>