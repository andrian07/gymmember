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
            PT Information
        </div>
    </div>
    <div id="appCapsule" class="extra-header-active full-height" style="margin-top:-10px !important;">
        <?php foreach($data['pt_information'] as $row){ ?>
            <div class="section mt-2 text-center">
                <div class="card">
                    <div class="card-body pt-3 pb-3">
                        <img src="<?= $this->config->item('image_url'); ?>pt/<?php echo $row['coach_image']; ?>" alt="image" class="imaged w-50 ">
                        <h2 class="mt-2"><?php echo htmlspecialchars($row['coach_name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="section mt-2 mb-2">
                <div class="card">
                    <div class="card-body pt-3 pb-3">
                        <h4>Biography</h4>
                        <p><?php echo nl2br(htmlspecialchars($row['coach_title'], ENT_QUOTES, 'UTF-8')); ?></p>
                        <div class="timeline ms-3">
                            <div class="item">
                                <div class="dot bg-primary"></div>
                                <div class="content">
                                    <h4 class="title">Status</h4>
                                    <div class="text"><?php echo htmlspecialchars($row['ms_pt_price_name'], ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dot bg-primary"></div>
                                <div class="content">
                                    <h4 class="title">Start From</h4>
                                    <div class="text"><?php echo number_format($row['ms_pt_price_price'], 0, ',', '.'); ?></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        <?php } ?>
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
                                    <ion-icon name="information-circle-outline" role="img" class="md hydrated"></ion-icon>
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

                    <!-- * Dialog Block Button -->
                    <div class="modal fade dialogbox" id="Errorbookpt" data-bs-backdrop="static" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                             <div class="modal-icon text-info">
                                <ion-icon name="information-circle-outline"></ion-icon>
                            </div>
                            <div class="modal-body" id="error-messages">
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

                <!-- * Dialog Block Button -->
                <div class="modal fade dialogbox" id="ErrorBookDaily" data-bs-backdrop="static" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-icon text-info">
                                <ion-icon name="information-circle-outline"></ion-icon>
                            </div>
                            <div class="modal-body" id="error-messagea">
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
                                            <label class="label" for="pt_session">Paket Kelas:</label>
                                            <select class="form-control custom-select" id="pt_session">
                                                <option value="">--Pilih Sesi--</option>
                                                <?php foreach($data['ms_pt_package'] as $sesion_list){ ?>
                                                    <option value="<?php echo $sesion_list['ms_pt_package_price_id'] ?>"><?php echo $sesion_list['ms_pt_package_price_name'] ?> Sesi</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-info">Pilih Jumlah Sesi</div>
                                    </div>
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="pt_total_price">Total Harga:</label>
                                            <input type="text" class="form-control" id="pt_total_price">
                                            <i class="clear-input">
                                                <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="class_start_date">Tanggal Mulai:</label>
                                            <input type="date" class="form-control" id="class_start_date" value="2026-01-05">
                                            <i class="clear-input">
                                                <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-inline">
                                        <button type="button" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</button>
                                        <button type="button" id="bookpt" class="btn btn-text-success" data-bs-dismiss="modal">JOIN</button>
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





    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
    <script>

        $('#pt_session').on('change', function(){
            var package_id   = $(this).val();
            let csrfName = $('meta[name=csrf-name]').attr('content');
            let csrfHash = $('meta[name=csrf-hash]').attr('content');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Discovery/get_pt_price",
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
                        $('#pt_total_price').val(price);
                    }else{
                        $('#error-messages').text(data.result);
                        $('#Errorbookpt').modal('show');
                        $('#DialogForm').modal('hide');
                    }
                }
            });
        });

        $('#bookpt').click(function(e){
            e.preventDefault();
            let pt_session           = $("#pt_session").val(); 
            let class_start_date     = $("#class_start_date").val();
            let csrfName             = $('meta[name=csrf-name]').attr('content');
            let csrfHash             = $('meta[name=csrf-hash]').attr('content');
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Book/bookmonthlypt",
                dataType: "json",   
                data: {
                    [csrfName]: csrfHash,
                    pt_session:pt_session,
                    class_start_date:class_start_date
                },                                                               
                success : function(data){
                    if (data.csrf_name && data.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', data.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                    }            
                    if (data.code == "200"){
                        window.location.href = "<?php echo base_url(); ?>Payment/transferpage?id=" + data.transaction_register_id + "&category=memberpt";
                    }else{
                        $('#error-messagea').text(data.message);
                        $('#ErrorBookDaily').modal('show');
                        $('#DialogIconedButtonInline').modal('hide');
                    }
                }
            });
        });
    </script>
</body>

</html>