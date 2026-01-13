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
        <img src="<?php echo base_url(); ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

     <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Detail Transaksi
        </div>
        <div class="right">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasic">
                <ion-icon name="trash-outline"></ion-icon>
            </a>
        </div>
    </div>
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">

            <?php foreach($data['get_history_by_id'] as $td) { ?>
            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <ion-icon name="receipt-outline" role="img" class="md flip-rtl hydrated"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Payment</h3>
                <h4 class="text-center mt-2"><?php echo '#'.$td['transaction_register_inv']; ?></h4>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status</strong>
                     <?php if($td['transaction_status'] == 'Pending'){ ?>
                        <span class="text-primary"> <?php echo $td['transaction_status']; ?></span>
                    <?php }else if($td['transaction_status'] == 'Lunas'){ ?>
                        <span class="text-success"> <?php echo $td['transaction_status']; ?></span>
                    <?php }else{ ?>
                        <span class="text-danger"> <?php echo $td['transaction_status']; ?></span>
                    <?php } ?>
                </li>
                <li>
                    <strong>Pembayaran</strong>
                    <?php if($td['payment_name']){ ?>
                        <span><?php echo $td['payment_name']; ?></span>
                    <?php }else{ ?>
                        <span>CASH</span>
                    <?php } ?>
                </li>
                <li>
                    <strong>Kategori</strong>
                    <?php if($td['transaction_type_member'] == 'Kelas Only'){ ?> 
                        <span><?php echo 'Kelas Harian'; ?></span>
                    <?php }else if($td['transaction_type_member'] == 'Member'){ ?>
                        <span><?php echo 'Membership'; ?></span>
                    <?php }else if($td['transaction_type_member'] == 'Member (GYM) + Kelas'){ ?>
                        <span><?php echo 'Member Kelas + GYM'; ?></span>
                    <?php } ?>
                </li>
                <li>
                    <strong>Paket</strong>
                        <?php if($td['transaction_class'] == 'Y'){ ?> 
                            <span><?php echo $td['ms_class_package_name']; ?></span>
                        <?php } ?>
                        <?php if($td['member_gym'] == 'Y'){ ?> 
                            <span><?php echo $td['ms_gym_package_name']; ?></span>
                        <?php } ?>
                        <?php if($td['transaction_pt'] == 'Y'){ ?> 
                            <span><?php echo $td['ms_pt_package_price_name']; ?></span>
                        <?php } ?>
                </li>
                <li>
                    <strong>Tanggal</strong>
                    <span><?php echo date("d-m-Y H:i:s", strtotime($td['transaction_created_at'])); ?></span>
                </li>
                <li>
                    <strong>Total</strong>
                    <h3 class="m-0"><?php echo 'Rp. '.number_format($td['transaction_payment_total']); ?></h3>
                </li>
            </ul>
                <?php if($td['transaction_payment_id'] != '1'){ ?>
                    <button type="button" class="btn btn-primary btn-lg btn-block mt-3" onclick="location.href='<?php echo base_url(); ?>Payment/uploadpayment?id=<?php echo $td['transaction_register_id']; ?>'">Upload Bukti Pembayaran</button>
                <?php } ?>  
            <?php } ?>
                      
        </div>

    </div>
    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
    <script>
    </script>

</body>

</html>