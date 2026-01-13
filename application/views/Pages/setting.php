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

            document.getElementById('avatarPreview').src =
            URL.createObjectURL(file);

            let csrfName      = $('meta[name=csrf-name]').attr('content');
            let csrfHash      = $('meta[name=csrf-hash]').attr('content');

            notification('notification-7', 5000)
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

    </script>
</body>
</html>