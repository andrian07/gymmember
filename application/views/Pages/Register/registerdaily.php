<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style>
 .select2-container--default .select2-selection--single {
    border: none !important; 
}
.select2-container--default .select2-selection--single {
    border-bottom: 1px solid #aaa !important;
}
.form-group .clear-inputs {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #958d9e;
    height: 38px;
    font-size: 22px;
    position: absolute;
    right: -10px;
    bottom: 0;
    width: 32px;
    opacity: 0.5;
}

span.select2-selection.select2-selection--single {
    margin-top: 10px;
}
</style>
<body>

<!-- loader -->
<div id="loader">
    <img src="<?php echo base_url(); ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
</div>
<!-- * loader -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Pendaftaran Kelas</h1>
        <h4>Elluna Gym & Fitness</h4>
    </div>
    <div class="section mb-5 p-2">
        <div class="card">
            <div class="card-body">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="phone">No HP:</label>
                        <input type="tel" class="form-control" id="phone" placeholder="No HP">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="gender">Jenis Kelamin:</label>
                        <select class="form-control" id="gender">
                            <option value="Wanita">Wanita</option>
                            <option value="Pria">Pria</option>
                        </select>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="select4">Kelas:</label>
                        <select class="form-control js-example-basic-single" id="class_list">

                        </select>
                    </div>
                </div>

                <div class="row">
                 <div class="col-6">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="phone">Hari:</label>
                            <select class="form-control js-example-basic-single" id="day">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="currency1">Tanggal</label>
                            <input type="text" class="form-control" id="datepicker">
                            <i class="clear-inputs">
                                <ion-icon name="calendar"></ion-icon>
                            </i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="phone">Harga Kelas:</label>
                    <input type="text" class="form-control" id="htm" value="0" readonly>
                </div>
            </div>

            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="payment">Pembayaran:</label>
                    <select class="form-control" id="payment">
                        <option value="1">Cash</option>
                        <option value="2">BCA</option>
                        <option value="3">BNI</option>
                        <option value="4">Mandiri</option>
                    </select>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-group basic" style="margin-top:35px;">
                <button type="button" id="save" class="btn btn-primary btn-block btn-lg">Daftar</button>
            </div>
        </div>
    </div>
</div>

<div id="toast-16" class="toast-box toast-bottom bg-danger">
    <div class="in">
        <div class="text">
            Anda Sudah Terdaftar Di Tanggal Tersebut
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
</div>

</div>
<!-- * App Capsule -->

<?php 
require DOC_ROOT_PATH . $this->config->item('footer1');
?>


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>

<script type="text/javascript">
    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>'; 
    var csrfHash = '<?= $this->security->get_csrf_hash(); ?>'; 

    $( document ).ready(function() {
        class_list();
    });

    let class_price = new AutoNumeric('#htm', {
        currencySymbol : 'Rp. ',
        decimalCharacter : ',',
        decimalPlaces: 0,
        decimalPlacesShownOnFocus: 0,
        digitGroupSeparator : '.',
    });


    $("#datepicker").datepicker({
        beforeShowDay: function (d) {
            var day = d.getDay();
            var selectedTexti = $('#day').select2('data')[0].text;
            const character = " (";
            const index = selectedTexti.indexOf(character);
            const selectedText = selectedTexti.substring(0, index);
            console.log(selectedText);
            if(selectedText == 'Minggu'){
                return [day == 0];
            }
            if(selectedText == 'Senin'){
                return [day == 1];
            }
            if(selectedText == 'Selasa'){
                return [day == 2];
            }
            if(selectedText == 'Rabu'){
                return [day == 3];
            }
            if(selectedText == 'Kamis'){
                return [day == 4];
            }
            if(selectedText == 'Jumat'){
                return [day == 5];
            }
            if(selectedText == 'Sabtu'){
                return [day == 6];
            }
        },
    });

    function class_list() {
        $.ajax({
            url: '<?= site_url('Globals/get_class_list') ?>',
            type: 'POST',
            dataType: "json",
            data: {
                [csrfName]: csrfHash
            },
            success: function(res) {
                let row =  res.result.get_class_list;
                let length = res.result.get_class_list.length;
                let text_temp = "";
                text_temp += '<option value="">--Pilih Kelas--</option>';
                for (let i = 0; i < length; i++) {
                    text_temp += '<option value="'+row[i].class_id+'">'+row[i].class_name+'</option>';
                }

                $('#class_list').html(text_temp);
                if (res.csrfName && res.csrfHash) {
                    csrfName = res.csrfName;
                    csrfHash = res.csrfHash;
                }
            },
            error: function(err) {
                console.log('Error:', err);
            }
        });
    }

    $('#class_list').on('change', function() {
        var id = this.value;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Globals/get_class_price",
            dataType: "json",
            data: {
                [csrfName]: csrfHash,
                id:id
            },
            success : function(res){
                if (res.code == "200"){
                    let row = res.result.get_class_price;
                    let length = res.result.get_class_price.length;
                    let text_temp = "";
                    for (let i = 0; i < length; i++) {
                        text_temp += '<option value="'+row[i].schedule_class_id+'">'+row[i].schedule_day+' ('+row[i].schedule_time_start+') </option>';
                    }
                    $('#day').html(text_temp);
                    class_price.set(row[0].class_price);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data Tidak Di Temukan',
                    })
                }
                if (res.csrfName && res.csrfHash) {
                    csrfName = res.csrfName;
                    csrfHash = res.csrfHash;
                }

            }
        });
    }); 


    $('#save').click(function(e){
        e.preventDefault();
        var name                   = $("#name").val();
        var phone                  = $("#phone").val();
        var gender                 = $("#gender").val();
        var class_id               = $("#class_list").val();
        var schedule_class_id      = $("#day").val();
        var datepicker             = $("#datepicker").val();
        var class_price_val        = class_price.get();
        var payment                = $("#payment").val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Globals/save_transaction",
            dataType: "json",
            data: {
                [csrfName]: csrfHash,
                name:name, 
                phone:phone, 
                gender:gender, 
                class_id:class_id,
                schedule_class_id:schedule_class_id,
                datepicker:datepicker,
                class_price_val:class_price_val, 
                payment:payment
            },
            success : function(data){
                if (data.code == "200"){
                    let invoice = data.result;
                    window.location.href = "<?php echo base_url(); ?>/Register/successregister?id="+invoice;
                }else {
                    $("#toast-16").addClass("show");
                }
                if (data.csrfName && data.csrfHash) {
                    csrfName = res.csrfName;
                    csrfHash = res.csrfHash;
                }
            }
        });
    });

</script>
