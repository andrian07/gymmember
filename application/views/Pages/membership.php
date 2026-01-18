<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }
    .blog-card {
        height: 200px;
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
        <div class="right">
            <button id="install-pwa-button" style="display: none; background: #6236FF; color: white; border: none; padding: 8px 12px; border-radius: 5px; font-size: 12px;">Install App</button>
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
                                    <h2 class="title" style="font-size:15px;">Belum Ada Paket Aktif</h2>
                                    <p style="font-size: 12px; line-height: 16px;">Jika Anda sudah membeli keanggotaan, <br /> akan muncul di sini.</p>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>

            <h2 class="title" style="font-size:15px; margin-top: 40px;">Temukan Keanggotaan yang Sesuai untuk Anda!</h2>
            <span class="badge badge-dark">Gym Package</span>

            <div class="row" style="margin-top: 20px;">
                <?php foreach($data['gym_package_member'] as $row){ ?>
                    <div class="col-6 mb-2">
                        <?php if (!empty($_SESSION['user_name']) && $data['cookies'] != 0) { ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#DialogForm" data-packageid="<?php echo $row['ms_gym_package_id']; ?>" data-packagename="<?php echo $row['ms_gym_package_name']; ?>" data-packageprice="<?php echo $row['package_price']; ?>">
                            <?php }else{ ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#DialogFormError">
                                <?php } ?>
                                <div class="blog-card">
                                    <img src="<?= $this->config->item('image_url'); ?>Package/<?php echo $row['ms_gym_package_image']; ?>" alt="image" class="imaged w-100" onerror="this.src='assets/img/default.png'" style="height: 100px;">
                                    <div class="text" style="text-align:center;">
                                        <h4 style="overflow: hidden; font-size: 0.9em !important;">Paket <?php echo $row['ms_gym_package_name']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
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
                                <h5 class="modal-title">Join Membership Gym</h5>
                            </div>
                            <form>
                                <div class="modal-body text-start mb-2">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="gym_package_name">Nama Paket:</label>
                                            <input type="hidden" class="form-control" id="gym_package_id">
                                            <input type="text" class="form-control" id="gym_package_name">
                                     </div>
                                     <div class="input-info">Nama Paket Yang Di Beli</div>
                                </div>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="gym_package_price">Harga:</label>
                                        <input type="text" class="form-control" id="gym_package_price">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>  
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="gym_start_date">Tanggal Mulai:</label>
                                        <input type="date" class="form-control" id="gym_start_date" value="<?php echo date('Y-m-d'); ?>">
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
                                    <button type="button" id="joingym" class="btn btn-text-success"
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

    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
     <script>

        let gymprice = new AutoNumeric('#gym_package_price', {
            currencySymbol: 'Rp ',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalPlaces: 0,
            unformatOnSubmit: true
        });

        $('#DialogForm').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget); // element <a> yang diklik
            var modal  = $(this); // ini modalnya

            var id = button.data('packageid');
            var name = button.data('packagename');
            var price = button.data('packageprice');
            modal.find('#gym_package_id').val(id);   
            modal.find('#gym_package_name').val(name);
            gymprice.set(price);
            modal.find('.modal-title').text('Join ' + name + ' Class');
        });

        $('#joingym').click(function(e){
            e.preventDefault();
            let gym_package_id     = $("#gym_package_id").val(); 
            let gym_start_date     = $("#gym_start_date").val(); 
            let csrfName           = $('meta[name=csrf-name]').attr('content');
            let csrfHash           = $('meta[name=csrf-hash]').attr('content');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Book/bookgym",
                dataType: "json",   
                data: {
                    [csrfName]: csrfHash,
                    gym_package_id:gym_package_id,
                    gym_start_date:gym_start_date,
                },                                                               
                success : function(data){
                    if (data.csrf_name && data.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', data.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                    }            
                    if (data.code == "200"){
                        window.location.href = "<?php echo base_url(); ?>Payment/transferpage?id=" + data.transaction_register_id + "&category=membergym";
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