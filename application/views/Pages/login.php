<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?php echo base_url() ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <img src="<?php echo base_url() ?>assets/img/logo.png" style="width: 30%; margin-bottom:20px ;">
            <h1>Log in</h1>
            <h4>Elluna Gym Member</h4>
        </div>
        <div class="section mb-5 p-2">

            <form action="index.html">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">No HP</label>
                                <input type="number" class="form-control" id="name" placeholder="No HP">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="<?php echo base_url() ?>Register">Register Now</a>
                    </div>
                    <div><a href="<?php echo base_url() ?>Register/forgetpass" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="button" id="btnlogin" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->

    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');


    ?>
    <script>

        $('#btnlogin').click(function(e){
            e.preventDefault();
            var name          = $("#name").val();
            var pass          = $("#password").val();
            let csrfName      = $('meta[name=csrf-name]').attr('content');
            let csrfHash      = $('meta[name=csrf-hash]').attr('content');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Auth/login",
                dataType: "json",   
                data: {
                    [csrfName]: csrfHash,    // kirim CSRF DINAMIS
                    name:name,
                    pass:pass
                },                                                               
                success : function(data){
                    console.log(data);
                    if (data.result.csrf_name && data.result.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', data.result.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', data.result.csrf_hash);
                    }            
                    if (data.code == "200"){
                        window.location.href = "<?php echo base_url(); ?>Dashboard";
                    }else {
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.result.result,
                    })
                  }
              }
          });
        });
    </script>
