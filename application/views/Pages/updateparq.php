<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<style type="text/css">
    .card-block .card-main {
        background: #ffffff !important;
        padding: 0;
    }
    .form-group .label {
        font-size: 14px !important;
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
                        <div class="section-title" style="text-align:center; color:#1572e8!important">Physical Activity Readiness Questionnaire (PARQ)</div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">1.) Apakah dokter Anda pernah mengatakan bahwa Anda memiliki kondisi jantung dan Anda hanya boleh melakukan aktivitas fisik yang direkomendasikan oleh dokter?</label>
                                <div class="form-group boxed">
                                    <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                        <input class="form-check-input" type="radio" name="q1" id="q1y" value="Y">
                                        <label class="form-check-label" for="q1y">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                        <input class="form-check-input" type="radio" name="q1" id="q1n" value="N">
                                        <label class="form-check-label" for="q1n">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-wrapper">
                                <label class="label" for="text4b">2.) Apakah Anda merasakan nyeri dada saat melakukan aktivitas fisik?</label>
                                <div class="form-group boxed">
                                    <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                        <input class="form-check-input" type="radio" name="q2" id="q2y" value="Y">
                                        <label class="form-check-label" for="q2y">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                        <input class="form-check-input" type="radio" name="q2" id="q2n" value="N">
                                        <label class="form-check-label" for="q2n">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrapper">
                                <label class="label" for="text4b">3.) Dalam sebulan terakhir, apakah Anda merasakan nyeri dada saat tidak melakukan aktivitas fisik apa pun ?</label>
                                <div class="form-group boxed">
                                    <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                        <input class="form-check-input" type="radio" name="q3" id="q3y" value="Y">
                                        <label class="form-check-label" for="q3y">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                        <input class="form-check-input" type="radio" name="q3" id="q3n" value="N">
                                        <label class="form-check-label" for="q3n">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrapper">
                                <label class="label" for="text4b">4.) Apakah Anda memiliki masalah tulang atau sendi yang dapat menjadi buruk diakibatkan aktivitas fisik Anda ?</label>
                                <div class="form-group boxed">
                                    <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                        <input class="form-check-input" type="radio" name="q4" id="q4y" value="Y">
                                        <label class="form-check-label" for="q4y">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                        <input class="form-check-input" type="radio" name="q4" id="q4n" value="N">
                                        <label class="form-check-label" for="q4n">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrapper">
                                <label class="label" for="text4b">5.) Apakah Anda saat ini mengkonsumsi obat untuk tekanan darah Anda atau untuk kondisi jantung Anda ?</label>
                                <div class="form-group boxed">
                                    <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                        <input class="form-check-input" type="radio" name="q5" id="q5y" value="Y">
                                        <label class="form-check-label" for="q5y">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                        <input class="form-check-input" type="radio" name="q5" id="q5n" value="N">
                                        <label class="form-check-label" for="q5n">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrapper">
                                <label class="label" for="text4b">6.) Apakah Anda tahu alasan lain mengapa Anda tidak boleh melakukan aktivitas fisik ?</label>
                                <div class="form-group boxed">
                                    <div class="form-check mb-1" style="display:inline !important; margin-right: 4px;">
                                        <input class="form-check-input" type="radio" name="q6" id="q6y" value="Y">
                                        <label class="form-check-label" for="q6y">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check mb-1" style="display:inline !important; margin-left: 4px;">
                                        <input class="form-check-input" type="radio" name="q6" id="q6n" value="N">
                                        <label class="form-check-label" for="q6n">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 20px;">
                                <button type="button" id="btnsave" class="btn btn-primary btn-block btn-lg">Save</button>
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
                var q1            = $('input[name="q1"]:checked').val();
                var q2            = $('input[name="q2"]:checked').val();
                var q3            = $('input[name="q3"]:checked').val();
                var q4            = $('input[name="q4"]:checked').val();
                var q5            = $('input[name="q5"]:checked').val();
                var q6            = $('input[name="q6"]:checked').val();

                let csrfName      = $('meta[name=csrf-name]').attr('content');
                let csrfHash      = $('meta[name=csrf-hash]').attr('content');

                console.log(q1);

                if (!q1) {
                    let msg = 'Silahkan Isi Pertanyaan No 1'
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }else if(!q2){
                    let msg = 'Silahkan Isi Pertanyaan No 2'
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }else if(!q3){
                    let msg = 'Silahkan Isi Pertanyaan No 3'
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }else if(!q4){
                    let msg = 'Silahkan Isi Pertanyaan No 4'
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }else if(!q5){
                    let msg = 'Silahkan Isi Pertanyaan No 5'
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }else if(!q6){
                    let msg = 'Silahkan Isi Pertanyaan No 6'
                    toastbox('toast-1')
                    $('#msg').text(msg);
                }else{
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>Setting/update_parq",
                        dataType: "json",   
                        data: {
                        [csrfName]: csrfHash,    // kirim CSRF DINAMIS
                        q1:q1,
                        q2:q2,
                        q3:q3,
                        q4:q4,
                        q5:q5,
                        q6:q6
                    },                                                               
                    success : function(data){
                        console.log(data.csrf_name);
                        if (data.result.csrf_name && data.result.csrf_hash) {
                            $('meta[name=csrf-name]').attr('content', data.csrf_name);
                            $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                        }            
                        if (data.code == "200"){
                            window.location.href = "<?php echo base_url(); ?>Dashboard";
                        }else {
                          Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.result,
                        })
                          $('meta[name=csrf-name]').attr('content', data.csrf_name);
                          $('meta[name=csrf-hash]').attr('content', data.csrf_hash);
                      }
                  }
              });
                }
            });
        </script>