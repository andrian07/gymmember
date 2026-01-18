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
            Setting
        </div>
    </div>
    <div id="appCapsule">

        <div id="notification-7" class="notification-box">
            <div class="notification-dialog ios-style">
                <div class="notification-header">
                    <div class="in">
                        <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="imaged w24 rounded">
                        <strong>Upload Image</strong>
                    </div>
                    <div class="right">
                        <span>a mins ago</span>
                        <a href="#" class="close-button">
                            <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="notification-content">
                    <div class="in">
                        <h3 class="subtitle">Success Upload Photo.</h3>
                        <div class="text">
                            photo has been changed.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- name dialog -->
        <div class="modal fade dialogbox" id="namedialog" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Name</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="text" class="form-control" id="name">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                            <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">CHANGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end name dialog -->

        <!-- phone dialog -->
        <div class="modal fade dialogbox" id="phonedialog" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Phonenumber</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="text" class="form-control" id="phonenumber">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                            <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">CHANGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end phone dialog -->

        <!-- phone dialog -->
        <div class="modal fade dialogbox" id="emaildialog" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Email</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="text" class="form-control" id="email">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                            <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">CHANGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end phone dialog -->

        <!-- phone dialog -->
        <div class="modal fade dialogbox" id="addressdialog" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Address</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <textarea id="address" rows="2" class="form-control" placeholder="Textarea"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                            <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">CHANGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Night Session dialog -->
        <div class="modal fade dialogbox" id="nightsesion" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Request Sesi Malam</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <select class="form-control custom-select" id="nightsesiontime">
                                    <option value="24:00">24:00</option>
                                    <option value="01:00">01:00</option>
                                    <option value="02:00">02:00</option>
                                    <option value="03:00">03:00</option>
                                    <option value="04:00">04:00</option>
                                    <option value="05:00">05:00</option>
                                    <option value="06:00">06:00</option>
                                </select>
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                            <a href="#" id="requestnightsesi" class="btn btn-text-primary" data-bs-dismiss="modal">Request</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Night Session dialog -->

        <!-- end phone dialog -->
        <?php foreach($data['my_member'] as $row){ ?>
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#" onclick="openFileUpload(event)">
                    <img src="<?= $this->config->item('image_url'); ?>member/<?php echo $row['member_image']; ?>" alt="avatar" id="avatarPreview" class="imaged w100 rounded">
                    <span class="button">
                        <ion-icon name="camera-outline" role="img" class="md hydrated"></ion-icon>
                    </span>
                </a>
                <input type="file" id="fileInput" style="display:none" onchange="previewAvatar(this)">
            </div>
        </div>

        <div class="listview-title mt-1">Theme</div>
        <ul class="listview image-listview text inset no-line">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Dark Mode
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                            <label class="form-check-label" for="darkmodeSwitch"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>   
        
        <?php
            $currentHour = date('H'); // format 24 jam (00–23)

            if ($currentHour >= 7 && $currentHour <= 23):
        ?>
        <div class="listview-title mt-1">Utility</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#nightsesion" data-id="<?php echo $row['member_name']; ?>">
                    <div class="in">
                        <div>Sesi Malam</div>
                        <span class="text-primary">Request</span>
                    </div>
                </a>
            </li>
        </ul>
        <?php endif; ?>

        <div class="listview-title mt-1">Notifications</div>
        <ul class="listview image-listview text inset">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Class Alert
                            <div class="text-muted">
                                Send notification when today have class
                            </div>
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                            <label class="form-check-label" for="SwitchCheckDefault1"></label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="item" style="padding-right: 15px;">
                    <div class="in">
                        <div>Member ID</div>
                        <span class="text-primary"><?php echo $row['member_code']; ?></span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#namedialog" data-id="<?php echo $row['member_name']; ?>">
                    <div class="in">
                        <div><?php echo $row['member_name']; ?></div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#phonedialog" data-id="<?php echo $row['member_phone']; ?>">
                    <div class="in">
                        <div><?php echo $row['member_phone']; ?></div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#emaildialog" data-id="<?php echo $row['member_email']; ?>">
                    <div class="in">
                        <div>Update E-mail</div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#addressdialog" data-id="<?php echo $row['member_address']; ?>">
                    <div class="in">
                        <div>Address</div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset">
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Update Password</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Log out all devices</div>
                    </div>
                </a>
            </li>
        </ul>
        <?php } ?>

    </div>
    <!-- DialogIconedSuccess -->
    <div class="modal fade dialogbox" id="DialogIconedSuccess" data-bs-backdrop="static" tabindex="-1"
    role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-icon text-success">
                <ion-icon name="checkmark-circle"></ion-icon>
            </div>
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
            </div>
            <div class="modal-body">
                Sukses Request Sift Malam
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * DialogIconedSuccess -->
<div class="modal fade dialogbox" id="ErrorBookDaily" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-icon text-info">
            <ion-icon name="information-circle-outline"></ion-icon>
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


<?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
?>
<script>
    AddtoHome("2000", "once");

    function openFileUpload(e) {
            e.preventDefault(); // cegah reload
            document.getElementById('fileInput').click();
            
        }

    function previewAvatar(input) {
        const file = input.files[0];
        if (!file) return;
        // preview langsung
        document.getElementById('avatarPreview').src =
        URL.createObjectURL(file);
        let formData = new FormData();
        formData.append('member_image', file);
        // CSRF
        let csrfName = $('meta[name=csrf-name]').attr('content');
        let csrfHash = $('meta[name=csrf-hash]').attr('content');
        formData.append(csrfName, csrfHash);
        $.ajax({
            url: "<?= base_url('Setting/upload_image'); ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#loader').show();
            },
            success: function (res) {
                $('#loader').hide();

                    // update CSRF
                    if (res.csrf_name && res.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', res.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', res.csrf_hash);
                    }

                    if (res.status === true) {
                        // update preview pakai file dari server
                        $('#avatarPreview').attr('src', res.image_url);
                        notification('notification-7', 5000);
                    } else {
                        $('#error-message').text(res.message);
                        $('#ErrorBookDaily').modal('show');
                    }
                },
                error: function () {
                    $('#loader').hide();
                    alert('Upload gagal');
                }
            });
    }

    $('#phonedialog').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget); // trigger
            var id = button.data('id');
            var modal = $(this);
            modal.find('#phonenumber').val(id).focus();
        });

    $('#namedialog').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget); // trigger
            var id = button.data('id');
            var modal = $(this);
            modal.find('#name').val(id).focus();
        });

    $('#emaildialog').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget); // trigger
            var id = button.data('id');
            var modal = $(this);
            modal.find('#email').val(id).focus();
        });

    $('#addressdialog').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget); // trigger
            var id = button.data('id');
            var modal = $(this);
            modal.find('#address').val(id).focus();
        });

    $('#nightsesion').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget); // trigger
            var id = button.data('id');
            var modal = $(this);
        });

    $('#requestnightsesi').click(function(e){
        e.preventDefault();
        let nightsesiontime      = $("#nightsesiontime").val(); 
        let csrfName             = $('meta[name=csrf-name]').attr('content');
        let csrfHash             = $('meta[name=csrf-hash]').attr('content');
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Setting/submitnightsesion",
            dataType: "json",   
            data: {
                [csrfName]: csrfHash,
                nightsesiontime:nightsesiontime
            },                                                               
            success : function(data){
                if (data.csrf_name && data.csrf_hash) {
                    $('meta[name=csrf-name]').attr('content', data.csrf_name);
                    $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                }            
                if (data.code == "200"){
                    $('#DialogIconedSuccess').modal('show');
                    $('#nightsesion').modal('hide');
                }else{
                    $('#error-message').text(data.result);
                    $('#ErrorBookDaily').modal('show');
                }
            }
        });
    });
    
</script>
</body>
</html>