<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<!-- loader -->
<div id="loader">
    <img src="<?php echo base_url(); ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
</div>
<!-- * loader -->

<!-- App Header -->
<div class="appHeader">
    <div class="pageTitle">
        Transaction Detail
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule" class="full-height">

    <div class="section mt-2 mb-2">

        <?php foreach ($get_transaction as $row){ ?>

            <div class="listed-detail mt-3" style="text-align: center;">
                <h3 class="text-center mt-2">Pembayaran</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Invoice</strong>
                    <span class="text-success"><?php echo $row['transaction_register_inv']; ?></span>
                </li>
                <li>
                    <strong>Kelas</strong>
                    <span><?php echo $row['class_name']; ?></span>
                </li>
                <li>
                    <strong>Tanggal</strong>
                    <span><?php echo date("d-m-Y", strtotime($row['transaction_register_date'])); ?></span>
                </li>
                <li>
                    <strong>Jam</strong>
                    <span><?php echo date("h:i", strtotime($row['schedule_time_start'])); ?></span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span><?php echo $row['payment_name']; ?></span>
                </li>
                <li>
                    <strong>No Rekening</strong>
                    <span class="text-primary"><?php echo $row['payment_rekening']; ?></span>
                </li>
                <li>
                    <strong>Total</strong>
                    <h3 class="m-0">Rp. <?php echo number_format($row['transaction_payment_total']); ?></h3>
                </li>
            </ul>
            <p>*Silahkan Transfer Sesuai Dengan Nominal</p>
        <?php } ?>

    </div>

</div>
<!-- * App Capsule -->

<?php 
require DOC_ROOT_PATH . $this->config->item('footer1');
?>