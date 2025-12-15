<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header1');
?>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <a href="<?php echo base_url() ?>Auth" class="headerButton">
                Login
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account</h4>
        </div>
        <div class="section mb-5 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="phone">No HP</label>
                            <input type="text" class="form-control" id="phone" placeholder="No HP">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="dob">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="dob">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="gender">Jenis Kelamin</label>
                            <select class="form-control" id="gender">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="pass">Kore Referal</label>
                            <input type="text" class="form-control" id="referal_code">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="pass">Password</label>
                            <input type="password" class="form-control" id="pass">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="cfpass">Confirm Password</label>
                            <input type="password" class="form-control" id="cfpass">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    
                        <!--
                        <div class="custom-control custom-checkbox mt-2 mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckb1">
                                <label class="form-check-label" for="customCheckb1">
                                    I agree <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and
                                    conditions</a>
                                </label>
                            </div>
                        </div>
                    -->
                </div>
            </div>




            <div class="form-button-group transparent">
                <button type="button" id="register" class="btn btn-primary btn-block btn-lg">Register</button>
            </div>
        </div>

    </div>
    <!-- * App Capsule -->


    <!-- Terms Modal -->
    <div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <a href="#" data-bs-dismiss="modal">Close</a>
                </div>
                <div class="modal-body">
                    <p>
                        LETTER OF ACCEPTANCCE (Membership Terms and Conditions)
                        <br /><br />1.  All fees that have been paid are non-refundable under any circumstances. No Refund<br />
                        <i>Semua biaya yang sudah dibayarkan tidak dapat dikembalikan dalam keadaan apapun. Tidak Ada Pengembalian</i>
                        <br /><br />2.  You must not allow other people to use your membership. If this policy is violated, you will be charged guest fees and/or your membership will be suspended or cancelled subject to a cancellation fee.  Membership Abuse
                        <br /><i>
                        Anda tidak boleh membiarkan orang lain menggunakan keanggotaan Anda. Jika kebijakan ini dilanggar, Anda akan dikenakan biaya tamu dan atau keanggotaan Anda ditangguhkan atau dibatalkan dengan dikenakan biaya pembatalan. Penyalahgunaan Keanggotaan </i>
                        <br /><br />3.  You can bring first-time guests only by setting an appointment with the club staff and you must not bring in guests or other members at any time, You may be charged a guest fee and/or have your membership suspended or cancelled subject to a cancellation fee and/or charged all dues if this policy is violated. Guest terms and conditions apply. Guest Fee<br /><i>
                        Anda dapat membawa tamu pertama kali dengan membuat janji dengan staff klub dan anda tidak boleh membawa tamu atau anggota lain sembarang waktu. Anda akan dikenakan biaya dan atau keanggotaan anda dibatalkan dengan dikenakan biaya pembatalan dan atau membebankan semua biaya jika kebijakan ini dilanggar. Persyaratan dan ketentuan tamu berlaku. Biaya Tamu</i>
                        <br /><br />4.  You agree that the monthly direct debit/credit card auto pay of your membership dues will happen every 1st day of the month and are payable until the Minimum Term Expiry Date and during any Continuing Membership Period even if you do not use the club. On-going Membership/Auto-debit<br /><i>
                        Anda setuju bahwa pembayaran otomatis melalui kartu debit/kartu kredit bulanan langsung dari iuran keanggotaan Anda akan terjadi setiap hari pertama setiap bulannva dan harus dibayar hingga tanggal berakhirnya jangka waktu minimum dan selama periode keanggotaan masih berlanjut bahkan jika Anda tidak menggunakan club tersebut. Keanggotaan yang Berjalan/Debit Otomatis</i>
                        <br /><br />5.  It is your sole responsibility to ensure sufficient funds are in the nominated account or your credit card is valid with a sufficient credit limit and validity date when the monthly payments are due and if a debit/charge are unsuccessful you will be responsible for any administration fees and/or collection fees. It is your sole responsibility to ensure the monthly payments are charged to your account or credit card. The Club abstains itself from any in terms of communication to Members for failed payments. All charges and eventual fees are non-disputable. Late Payment Fee/Collection Fees<br /><i>
                        Merupakan tanggung jawab Anda untuk memastikan bahwa Anda memiliki dana yang cukup dalam akun yang dinominasikan atau kartu kredit Anda valid dengan batas kredit dan tanggal validitas yang mencukupi ketika pembayaran bulanan jatuh tempo dan jika debit biaya tidak berhasil. Anda akan bertanggung jawab atas biaya administrasi tambahan dan atau biaya penagihan. Merupakan tanggung Jawab Anda untuk memastikan pembayaran bulanan dibebankan ke akun atau kartu kredit Anda. Klub tidak melakukan apa pun dalam hal komunikasi kepada Anggota untuk pembayaran yang gagal. Semua biaya dan biaya tambahan lainnya tidak dapat diperdebatkan. Biaya Keterlambatan/Biaya Penagihan</i>
                        <br /><br />6.  You irrevocably agree and understand that the failure to meet the requirements in POINT 5 will incur in all your personal information available to Elluna Gym being passed on to debt collection service providers, law firms, financiers, government authorities or other organizations. Please note LEGAL ACTIONS WILL BE TAKEN against non-paying members. You agree the Club shall be entitled to recover all costs and expenses resulting from the engagement. Collection Service Providers<br /><i>
                        Anda tidak dapat membatalkan persetujuan dan memahami bahwa kegagalan untuk memenuhi persyaratan dalam POIN 5 akan dikenakan dalam semua informasi pribadi Anda yang tersedia untuk Elluna Gym untuk diteruskan ke penyedia layanan penagihan, firma hukum, ahli keuangan, otoritas pemerintah atau organisasi lainnya. Harap dicatat TINDAKAN HUKUM AKAN DIAMBIL terhadap anggota yang tidak membayar. Anda setuju bahwa klub berhak untuk memulihkan semua biaya dan pengeluaran yang ada dalam perjanjian. Penyedia Layanan Koleksi</i>
                        <br /><br />7.  You are not entitled to cancel your membership during the Minimum Term except in the circumstances set out in the Membership Agreement. Should you decide to cancel after your minimum term, a month calendar written notice will be required subject to the approval of the Management. The Management may require you to pay cancellation fees worth Rp 1.000.000.- or 2 months' worth of dues whichever is higher. Cancelation Procedure<br /><i>
                        Anda tidak berhak membatalkan keanggotaan Anda selama jangka waktu minimum kecuali dalam keadaan yang ditetapkan dalam Perjanjian Keanggotaan. Jika Anda memutuskan untuk membatalkan setelah jangka waktu minimum Anda, pemberitahuan tertulis satu bulan kalender akan diperlukan tergantung pada persetujuan Manajemen. Manajemen mungkin mengharuskan Anda membayar biaya pembatalan senilai RP 1.000.000.- atau 2 bulan iuran yang mana yang lebih tinggi. Prosedur Pembatalan</i>
                        <br /><br />8.  Should you be unable to use the facilities due to travels abroad or medical reasons, you must present a documentation in writing one month in advance to allow you to freeze your membership at no cost. You can suspend your membership for a min. of one (1) month and a freezing fee Rp 100.000.- will be charged, after which your membership will automatically become active and you will be billed for your regular monthly fee. Freeze Procedures<br /><i>
                        Jika Anda tidak dapat menggunakan fasilitas karena berpergian ke luar negeri atau alasan medis, Anda harus menunjukkan dokumentasi secara tertulis satu bulan sebelumnya untuk memungkinkan Anda membekukan keanggotaan Anda tanpa biaya. Anda dapat menangguhkan keanggotdan Anda selama minimum satu (1) bulan dan akan dikenakan biaya pembekuan senilai Rp 100.000.-, setelah itu keanggotaan Anda secara otomatis akan mulai aktif dan Anda akan ditagih iuran bulanan rutin Anda. Prosedur Pembekuan</i>
                        <br /><br />9.  You shall not engage in any type of commercial or business activity while using the facilities. You shall not act as a trainer for any other members or guest and any acts which constitute such business activities, your membership shall be subject to immediate cancellation and the balance of this Agreement declared due and payable in full immediately. Gym Ethics <br /><i>
                        Anda tidak boleh terlibat dalam jenis kegiatan komersial atau bisnis apa pun saat menggunakan fasilitas. Anda tidak boleh bertindak sebagai pelatih untuk anggota atau tamu lain dan tindakan apa pun yang merupakan kegiatan bisnis seperti itu, keanggotaan Anda akan segera mengalami pembatalan dan sisa dari Perjanjian ini dinyatakan jatuh tempo dan dibayar penuh segera. Etika Gym </i>
                        <br /><br />10. You hereby confirm your particulars; telephone and email addresses were provided and verified at the time of signing this agreement. You will promptly notify us in writing one month of any change in my particulars, circumstances, status, including any change in citizenship, residence, tax residency, address(es) on record, telephone and/or email addresses. Declaration of Personal Information <br />Dengan ini Anda mengkonfirmasi keterangan Anda; telepon dan alamat email yang diberikan dan diverifikasi pada saat menandatangani perjanjian ini. Anda akan segera memberi tahu kami secara tertulis satu bulan sebelum perubahan apa pun dalam hal khusus, keadaan, statu, termasuk setiap perubahan dalam kewarganegaraan, tempat tinggal, kependudukan pajak, alamat(es) pada catatan, telepon dan atau alamat email. Deklarasi Informasi Pribadi </p>
                        <br /><br />11. Members are expected not to leave valuables in the daily locker, and it there is a loss, Elluna Gym is not responsible, and members are not entitled to ask for replacement of goods or liability in any form. Members are not allowed to use the locker overnight, we will unload the items in the closet daily after operating hours finished and any loss beyond Elluna Gym. <br /><i>
                        Member diharapkan tidak meninggalkan barang berharga di dalam loker harian, dan apabila terjadi kehilangan Elluna Gym tidak bertanggung jawab atas kehilangan tersebut, dan member tidak berhak meminta pergantian barang atau pertanggung jawaban dalam bentuk apapun. Member juga tidak diperkenankan menginapkan barang di dalam loker harian, kami akan membongkar barang yang ada di dalam loker harian setelah jam operasional berakhir dan segala kehilangan di luar tanggung jawab Elluna Gym.</i>
                        <br /><br />
                        Elluna Gym will not honor any verbal agreement between a member and staff or any amendments to this agreement, terms and conditions. Only the terms and conditions printed on the membership agreement, Personal Training agreement and Club Rules will apply. <br /><i>
                        Elluna Gym tidak akan menerima perjanjian lisan apa pun antara keanggotaan dan staff atau amandemen apa pun terhadap perjanjian, persyaratan, dan ketentuan. Hanya syarat dan ketentuan tercetak pada perjanjian keanggotaan, perjanjian Pelatihan Pribadi dan Peraturan Klub yang akan berlaku. </i><br />
                        I hereby confirm that I am aware of and agree to the terms and conditions of Membership Agreement-Elluna Gym and this letter of acceptance.<br /><i>
                        Dengan ini saya menyatakan bahwa mengetahui dan menyetujui persyaratan dan ketentuan Perjanjian Keanggotaan - Happy Fit Kebugaran dan surat penerimaan ini.</i>
                    </p>

                    <br />
                    <div class="form-group">
                        <div class="form-check mb-1">
                            <input type="checkbox" class="form-check-input" id="termcondition">
                            <label class="form-check-label" for="customCheckb1">saya menyetujui syarat dan ketentuan</label>
                        </div>
                        <label class="form-check-label">Tanda Tangan Member</label>
                        <div style="border:1px solid #ccc; width:100%;">
                            <canvas id="signature-pad" width="300px" height="150"></canvas>
                        </div>
                        <br />
                        <input type="hidden" name="signature" id="signature">
                        <div class="row">
                            <div class="col">
                                <button type="button" id="clear" class="btn btn-warning btn-block btn-lg">Clear</button>
                            </div>
                            <div class="col">
                                <button type="button" id="btnsave" class="btn btn-info btn-block btn-lg">Simpan</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- * Terms Modal -->

<?php 
require DOC_ROOT_PATH . $this->config->item('footer2');
?>
<script>
    var canvas          = document.getElementById('signature-pad');
    var signaturePad    = new SignaturePad(canvas);

    $(document).ready(function () {
        $('#register').click(function () {
            $('#termsModal').modal('show');
        });
    });

    $('#clear').click(function () {
        signaturePad.clear();
    });

    $('form').on('submit', function () {
        if (!signaturePad.isEmpty()) {
            $('#signature').val(signaturePad.toDataURL());
        }
    });

    $('#btnsave').click(function(e){
        e.preventDefault();
        var name          = $("#name").val();
        var phone         = $("#phone").val();
        var email         = $("#email").val();
        var dob           = $("#dob").val();
        var gender        = $("#gender").val();
        var pass          = $("#pass").val();
        var cfpass        = $("#cfpass").val();
        var referal_code  = $("#referal_code").val();
        let csrfName      = $('meta[name=csrf-name]').attr('content');
        let csrfHash      = $('meta[name=csrf-hash]').attr('content');

        var signature      = signaturePad.toDataURL('image/png');

        if (signaturePad.isEmpty()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Tanda Tangan Belum Di Isi",
            })
        }else{
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Register/register_member",
                dataType: "json",   
                data: {
                    [csrfName]: csrfHash, 
                    name:name,
                    phone:phone,
                    email:email,
                    dob:dob,
                    gender:gender,
                    pass:pass,
                    cfpass:cfpass,
                    referal_code:referal_code,
                    signature: signature,
                },
                success : function(data){
                    console.log(data);
                    if (data.result.csrf_name && data.result.csrf_hash) {
                        $('meta[name=csrf-name]').attr('content', data.result.csrf_name);
                        $('meta[name=csrf-hash]').attr('content', data.result.csrf_hash);
                    }
                    if (data.code == "200"){
                        window.location.href = "<?php echo base_url(); ?>Auth";
                        Swal.fire('Saved!', '', 'success');
                    }else {
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.result.result,
                    })
                  }
              }
          });
        }
    });
</script>