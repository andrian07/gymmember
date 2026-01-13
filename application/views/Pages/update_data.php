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
            Update Data
        </div>
    </div>
    <div id="appCapsule">

        <?php foreach($my_member as $row){ ?>
            <div class="section mt-2 mb-2">
               
                <div id="toast-1" class="toast-box toast-top bg-danger">
                    <div class="in">
                        <div class="text" id="msg">
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
                </div>

                <div class="card">
                    <div class="card-body">
                         <div class="section-title" style="text-align:center; color: #1572e8!important;">Profile Info</div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $row['member_name']; ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">No HP</label>
                                <input type="tel" class="form-control" id="phone" placeholder="No HP" value="<?php echo $row['member_phone']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" value="<?php echo $row['member_email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Alamat</label>
                                <textarea id="address" rows="2" class="form-control" placeholder="Alamat"><?php echo $row['member_address']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Jenis Kelamin</label>
                                <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                    <?php if($row['member_gender'] == 'Pria'){ ?>
                                        <input class="form-check-input" type="radio" name="gender" id="genderW" value="Pria">
                                    <?php }else{ ?>
                                        <input class="form-check-input" type="radio" name="gender" id="genderW" value="Pria" checked>
                                    <?php } ?>
                                    <label class="form-check-label" for="genderW">
                                        Wanita
                                    </label>
                                </div>
                                <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                    <?php if($row['member_gender'] == 'Pria'){ ?>
                                        <input class="form-check-input" type="radio" name="gender" id="genderp" value="Wanita" checked>
                                    <?php }else{ ?>
                                        <input class="form-check-input" type="radio" name="gender" id="genderp" value="Wanita">
                                    <?php } ?>
                                    <label class="form-check-label" for="genderp">
                                        Pria
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">NIK</label>
                                <input type="tel" class="form-control" id="nik" placeholder="Nik" value="<?php echo $row['member_nik']; ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="dob" placeholder="Name" value="<?php echo $row['member_dob']; ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Nama Kontak Darurat</label>
                                <input type="text" class="form-control" id="urgent_name" placeholder="Nama Kontak Darurat" value="<?php echo $row['member_urgent_name']; ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">No HP Kontak Darurat</label>
                                <input type="tel" class="form-control" id="urgent_phone" placeholder="No HP Kontak Darurat" value="<?php echo $row['member_urgent_phone']; ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Hubungan</label>
                                <input type="text" class="form-control" id="relation" placeholder="Hubungan" value="<?php echo $row['member_urgent_sibiling']; ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Keterangan (alergi / penyakit bawaan /dll):</label>
                                <textarea id="desc" rows="2" class="form-control" placeholder="Keterangan"><?php echo $row['member_desc']; ?></textarea>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <button type="button" id="btnsave" class="btn btn-primary btn-block btn-lg">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer2');
    ?>

    <script>

        $('#btnsave').click(function(e){
            e.preventDefault();
            var name          = $("#name").val();
            var phone         = $("#phone").val();
            var email         = $("#email").val();
            var address       = $("#address").val();
            var gender        = $('input[name="gender"]:checked').val();
            var nik           = $("#nik").val();
            var dob           = $("#dob").val();
            var urgent_name   = $("#urgent_name").val();
            var urgent_phone  = $("#urgent_phone").val();
            var relation      = $("#relation").val();
            var desc          = $("#desc").val();
            let csrfName      = $('meta[name=csrf-name]').attr('content');
            let csrfHash      = $('meta[name=csrf-hash]').attr('content');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Setting/save_update",
                dataType: "json",   
                data: {
                    [csrfName]: csrfHash,    // kirim CSRF DINAMIS
                    name:name,
                    phone:phone,
                    email:email,
                    address:address,
                    gender:gender,
                    nik:nik,
                    dob:dob,
                    urgent_name:urgent_name,
                    urgent_phone:urgent_phone,
                    relation:relation,
                    desc:desc
                },                                                               
                success : function(data){
                    console.log(data);
                    if (data.csrf_name && data.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', data.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                    }            
                    console.log(data.code);
                    if (data.code == "200"){
                       window.location.href = "<?php echo base_url(); ?>Setting/parq";
                   }else {
                    let msg = data.result;
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }
            }
        });
        });
    </script>