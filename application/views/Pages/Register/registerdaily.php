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
</style>
<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Pendaftaran Kelas</h1>
            <h4>Elluna Gym & Fitness</h4>
        </div>
        <div class="section mb-5 p-2">
            <form action="index.html">
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
                                    <option value="">--Pilih Kelas--</option>
                                </select>
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
                                    <option value="Cash">Cash</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BCA">BCA</option>
                                </select>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-button-group transparent">
                    <button type="save" class="btn btn-primary btn-block btn-lg">Daftar</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->

    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>

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
                    console.log(row);
                    let text_temp = "";
                    for (let i = 0; i < length; i++) {
                        text_temp += '<option value="'+row[i].class_id+'">'+row[i].class_name+' ('+row[i].schedule_time_start+')</option>';
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
                        let row = res.result.get_class_price[0];
                        class_price.set(row.class_price);
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
    </script>
