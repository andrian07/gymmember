<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }
    .gradientSection {
        position: relative;
        text-align: center;
    }
</style>
<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url(); ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

     <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Class Information
        </div>
    </div>
    <div id="appCapsule" class="extra-header-active full-height" style="margin-top:-10px !important;">
          <!-- Coin Status -->
        <div class="section full gradientSection" style="margin-top:-40px;">
            <img src="<?= $this->config->item('image_url'); ?>class/banner_detail.png">
        </div>
        <!-- * Coin Status -->


        <!-- Coin Chart -->
        <div class="section mb-2">

        </div>
        <!-- Coin Chart -->
        <!-- Buttons -->
        <div class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php if (!empty($_SESSION['user_name']) && $data['cookies'] != 0) { ?>
                                <a href="#" class="btn btn-block btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#DialogForm">JOIN</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-block btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#DialogFormError">JOIN</a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- * Dialog Block Button -->
                    <div class="modal fade dialogbox" id="DialogFormError" data-bs-backdrop="static" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-icon text-info">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                </div>
                                <div class="modal-body" id="error-message">
                                    Silahkan login / Register terlebih dahulu untuk bergabung ke kelas.
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-inline">
                                        <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- * Dialog Block Button -->
                     <!-- Dialog Form -->
                    <div class="modal fade dialogbox" id="DialogForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Join Kelas</h5>
                                </div>
                                <form>
                                    <div class="modal-body text-start mb-2">

                                        <div class="form-group basic">
                                            <div class="input-wrapper">
                                                <label class="label" for="class_package">Paket Kelas:</label>
                                                <select class="form-control custom-select" id="class_package">
                                                     <?php foreach($data['class_package'] as $row){ ?>
                                                         <option value="<?php echo $row['ms_class_package_id']; ?>"><?php echo $row['ms_class_package_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="input-info">Pilih Paket Kelas Yang Di Ikutin</div>
                                        </div>
                                        <div class="form-group basic">
                                            <div class="input-wrapper">
                                                <label class="label" for="class_total_price">Total Harga:</label>
                                                <input type="text" class="form-control" id="class_total_price">
                                                <i class="clear-input">
                                                    <ion-icon name="close-circle"></ion-icon>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="form-group basic">
                                            <div class="input-wrapper">
                                                <label class="label" for="class_start_date">Tanggal Mulai:</label>
                                                <input type="date" class="form-control" id="class_start_date" value="<?php echo date('Y-m-d'); ?>">
                                                <i class="clear-input">
                                                    <ion-icon name="close-circle"></ion-icon>
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="btn-inline">
                                            <button type="button" class="btn btn-text-secondary"
                                                data-bs-dismiss="modal">CANCEL</button>
                                            <button type="button" id="joinmonthlyclass" class="btn btn-text-success"
                                                data-bs-dismiss="modal">JOIN</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- * Dialog Form -->
                </div>

            </div>
        </div>
        <!-- Buttons -->
        <!-- Stats -->
        <?php foreach($data['header_class'] as $row){ ?>
        <div class="section mt-2 mb-4">
            <div class="card" style="padding: 10px;">
                <div class="section mt-2">
                    <h1 style="text-align: center;">
                        <?php echo htmlspecialchars($row['class_name'], ENT_QUOTES, 'UTF-8'); ?>
                    </h1>
                    <hr>
                    <div class="lead">
                        <p style="font-size: 14px;">
                            <?php echo htmlspecialchars($row['class_desc'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        
        <div class="section mt-2 mb-4" style="margin-top: -20px !important;">
            <div class="card" style="padding: 10px;">
                <div class="section mt-2">
                    <div class="lead">
                        <h4 style="text-align: left;">
                            Schedule Class:
                        </h4>
                        <?php foreach($data['detail_class'] as $row){ ?>
                        <div class="text-muted" style="margin-top:10px;"><ion-icon name="accessibility-outline" role="img" class="md hydrated" style="margin-right: 5px;"></ion-icon><?php echo htmlspecialchars($row['coach_name'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <div class="text-muted"><ion-icon name="calendar-outline" role="img" class="md hydrated" style="margin-right: 5px;"></ion-icon><?php echo htmlspecialchars($row['schedule_day'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <div class="text-muted"><ion-icon name="time-outline" role="img" class="md hydrated" style="margin-right: 5px;"></ion-icon>16:00 - 17:00</div>
                        <hr>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stats -->
    </div>



    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
    <script>
    // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");

    $('#class_package').on('change', function(){
        var package_id   = $(this).val();
        let csrfName = $('meta[name=csrf-name]').attr('content');
        let csrfHash = $('meta[name=csrf-hash]').attr('content');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Discovery/get_package_price",
            dataType: "json",
            data: {
                [csrfName]: csrfHash,
                package_id: package_id
            },
            success: function(data){
                if (data.csrf_name && data.csrf_hash) {
                    $('meta[name=csrf-name]').attr('content', data.csrf_name);
                    $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                }
                if (data.code == "200"){
                    let price = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(data.result);
                    $('#class_total_price').val(price);
                }else{
                    alert(data.result);
                }
            }
        });
    });

    // Trigger change on page load to set initial price
    $('#class_package').trigger('change');


    $('#joinmonthlyclass').click(function(e){
        e.preventDefault();
        let class_package_id     = $("#class_package").val(); 
        let class_start_date     = $("#class_start_date").val();
        let csrfName             = $('meta[name=csrf-name]').attr('content');
        let csrfHash             = $('meta[name=csrf-hash]').attr('content');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Book/bookmonthlyclass",
            dataType: "json",   
            data: {
                [csrfName]: csrfHash,
                class_package_id:class_package_id,
                class_start_date:class_start_date
            },                                                               
            success : function(data){
                if (data.csrf_name && data.csrf_hash) {
                    $('meta[name=csrf-name]').attr('content', data.csrf_name);
                    $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                }            
                if (data.code == "200"){
                    window.location.href = "<?php echo base_url(); ?>Payment/transferpage?id=" + data.transaction_register_id + "&category=daily";
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