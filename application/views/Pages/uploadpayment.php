<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }

    .listview>li {
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
            Upload Transfer
        </div>
    </div>
    <div id="appCapsule">
        <div class="section mt-2">
            <div class="section-title" style="text-align:center;">Upload Bukti Transfer</div>
            <form>
                <div class="custom-file-upload" id="fileUpload1">
                    <?php
                        $transaction_code = $_GET['id'];
                    ?>
                    <input type="hidden" id="transaction_id" value="<?php echo $transaction_code; ?>">
                    <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                    <label for="fileuploadInput">
                        <span>
                            <strong>
                                <ion-icon name="arrow-up-circle-outline" role="img"
                                    class="md flip-rtl hydrated"></ion-icon>
                                <i>Upload a Photo</i>
                            </strong>
                        </span>
                    </label>
                </div>
                <button type="button" class="btn btn-primary btn-block mt-3" id="submitUploadPayment">Upload</button>
            </form>
            <!-- * Dialog Block Button -->
            <div class="modal fade dialogbox" id="ErrorBookDaily" data-bs-backdrop="static" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-icon text-danger">
                            <ion-icon name="close-circle-outline"></ion-icon>
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
    </div>
    <?php 
        require DOC_ROOT_PATH . $this->config->item('footer2');
    ?>
<script>
    $('#submitUploadPayment').click(function(e) {
        e.preventDefault();
        
        let transaction_id = $('#transaction_id').val();
        const fileInput = $('#fileuploadInput')[0];
        const file = fileInput.files[0];
        
        // Validate file
        if (!file) {
            $('#error-message').text('Silahkan Pilih Gambar');
            $('#ErrorBookDaily').modal('show');
        }
        if (!file.type.match('image.*')) {
            alert('Please select a valid image file (PNG, JPG, JPEG).');
            return;
        }
        if (file.size > 5 * 1024 * 1024) {  // 5MB limit
            alert('File size must be less than 5MB.');
            return;
        }
        
        // Show loader
        $('#loader').show();
        
        // Prepare FormData
        const formData = new FormData();
        formData.append('image', file);
        // Add CSRF if needed (adjust based on your setup)
        let csrfName = $('meta[name=csrf-name]').attr('content');
        let csrfHash = $('meta[name=csrf-hash]').attr('content');
        if (csrfName && csrfHash) {
            formData.append(csrfName, csrfHash);
        }
        formData.append('transaction_id', transaction_id);
        formData.append('image', file);
        
        // AJAX upload
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Payment/uploadpaymentimage"); ?>',  // Adjust URL to your controller method
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                $('#loader').hide();
                if (response.status === 'success') {
                    //alert('Image uploaded successfully!');
                    window.location.href = '<?php echo base_url("Payment/success_upload_image?id="); ?>' + transaction_id;
                } else {
                    $('#error-message').text(response.message);
                    $('#ErrorBookDaily').modal('show');
                }
                // Update CSRF if returned
                if (response.csrf_name && response.csrf_hash) {
                    $('meta[name=csrf-name]').attr('content', response.csrf_name);
                    $('meta[name=csrf-hash]').attr('content', response.csrf_hash);
                }
            },
            error: function(xhr, status, error) {
                $('#loader').hide();
                alert('Upload error: ' + error);
            }
        });
    });
</script>
</body>
</html>