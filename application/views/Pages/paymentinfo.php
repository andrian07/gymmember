<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }
    .listview > li {
        position: inherit !important;
    }
    h1 {
        font-size: 37px;
        font-weight: 700;
        margin-top: 35px;
        color: #6236FF;
    }
</style>
<body style="background-color:#ffffff;">

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
            Transaction Detail
        </div>
    </div>
    <div id="appCapsule">
        <div class="section mt-2">
            <div class="row">
                <div class="col-12">
                    <?php foreach ($data['transaction_detail'] as $item): ?>
                    <div class="invoice-title" style="text-align: center;">
                        <h1>Rp. <?= number_format($item['transaction_payment_total'], 0, ',', '.') ?></h1>
                        <h3><?= $item['class_name'] ?></h3>
                        <p class="text-muted">Ref: <?= $item['transaction_register_inv'] ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row" id="center-content">
                <div style="display: flex; align-items: center; justify-content: center; margin: 20px 0;">
                    <hr style="flex: 1; border: none; height: 1px; background-color: #000;margin-top: 5px;">
                    <h2 style="padding: 0 10px; font-weight: bold;">Pembayaran</h2>
                    <hr style="flex: 1; border: none; height: 1px; background-color: #000;margin-top: 5px;">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group basic">
                        <div class="exchange-group" style="text-align:center;">
                            <div class="input-col">
                                <h2 class="title" style="font-size:15px;">Silahkan Pilih Jenis Pembayaran:</h2>
                                <div style="margin-top: 20px; text-align: left;">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="cash">
                                        <label class="form-check-label" for="cash">Cash</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="transfer">
                                        <label class="form-check-label" for="transfer">Transfer Bank</label>
                                        </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="creditcard">
                                        <label class="form-check-label" for="creditcard">Credit atau Debit card</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row" id="cash-info" style="display:none;">
                <div class="col-12">
                    <div class="card bg-primary">
                        <div class="card-body text-center">
                            <h5 class="card-title">Cash</h5>
                            <p class="card-text">
                                Pembayaran Cash Dapat Di Lakukan Di Admin Elluna & Sport lt.4
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="transfer-info" style="display:none">
                <div class="col-12 section inset mt-2">
                    <div class="accordion" id="accordionExample2">
                        <?php foreach($data['bank_info'] as $bank){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion11" aria-expanded="false">
                                        Bank <?php echo $bank['payment_name']; ?>
                                    </button>
                                </h2>
                                <div id="accordion11" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2" style="">
                                    <div class="accordion-body">
                                        Rek: <?php echo ($bank['payment_rekening']); ?> <br>
                                        A.N: <?php echo ($bank['payment_desc']); ?>
                                    </div>
                                </div>
                                <div style="text-align: center; margin-bottom: 5px;">
                                    <input id="<?php echo ($bank['payment_rekening']); ?>" type="hidden" />
                                    <button class="btn btn-secondary btn-sm" onclick="copyToClipboard('<?php echo $bank['payment_rekening']; ?>')">Copy Rekening</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row" id="credit-info" style="display:none;">
                <div class="col-12">
                    <div class="card bg-danger">
                        <div class="card-body text-center">
                            <h5 class="card-title">Credit Card</h5>
                            <p class="card-text">
                                Fitur Credit Card Belum Bisa Di gunakan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="form-group basic">
                        <div class="exchange-group" style="text-align:center;">
                            <div class="form-button-group  transparent">
                                <?php foreach ($data['transaction_detail'] as $item): ?>
                                    <input type="hidden" id="transaction_id" value="<?php echo $item['transaction_register_id']; ?>" />
                                <?php endforeach; ?>
                                <button type="button" id="updatepayment" class="btn btn-primary btn-block btn-lg" style="background-color: #6236FF; border-color: #6236FF;">Submit Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="toast-11" class="toast-box toast-center">
                <div class="in">
                    <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
                    <div class="text" id="success-message-copy">
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-text-light close-button">CLOSE</button>
            </div>

             <!-- * Dialog Block Button -->
            <div class="modal fade dialogbox" id="ErrorBookDaily" data-bs-backdrop="static" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-icon text-danger">
                            <ion-icon name="error-circle-outline"></ion-icon>
                        </div>
                        <div class="modal-body" id="error-message">
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

        </div>
    </div>
    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer2');
    ?>
    <script>
        function copyToClipboard(text) {
            const tempTextArea = document.createElement("textarea");
            tempTextArea.value = text;
            document.body.appendChild(tempTextArea);
            tempTextArea.select();
            document.execCommand("copy");
            document.body.removeChild(tempTextArea);
            document.getElementById('success-message-copy').innerText = 'Rekening ' + text + ' berhasil di salin';
            document.getElementById('toast-11').style.display = 'block';
            setTimeout(() => {
                document.getElementById('toast-11').style.display = 'none';
            }, 3000);
        }

        document.getElementById('cash').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('cash-info').style.display = 'block';
                document.getElementById('transfer-info').style.display = 'none';
                document.getElementById('credit-info').style.display = 'none';
            }
        });

        document.getElementById('transfer').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('cash-info').style.display = 'none';
                document.getElementById('transfer-info').style.display = 'block';
                document.getElementById('credit-info').style.display = 'none';
            }
        });

        document.getElementById('creditcard').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('cash-info').style.display = 'none';
                document.getElementById('transfer-info').style.display = 'none';
                document.getElementById('credit-info').style.display = 'block';
            }
        });

        $('#updatepayment').click(function(e){
            e.preventDefault();
            var id            = $("#transaction_id").val();
            var paymentType   = $('input[name="flexRadioDefault"]:checked').attr('id');
            let csrfName      = $('meta[name=csrf-name]').attr('content');
            let csrfHash      = $('meta[name=csrf-hash]').attr('content');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Payment/updatepaymenttype",
                dataType: "json",   
                data: {
                    [csrfName]: csrfHash,
                    id:id,
                    paymentType:paymentType
                },                                                               
                success : function(data){
                    console.log(data);
                    if (data.csrf_name && data.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', data.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                    }
                    if (data.code == "200"){
                        if(paymentType == 'cash')
                            window.location.href = "<?php echo base_url(); ?>Payment/success_upload_image?id=" + data.transaction_register_id;
                        else
                            window.location.href = "<?php echo base_url(); ?>Payment/uploadpayment?id=" + data.transaction_register_id;
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