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
            History
        </div>
    </div>
    <div id="appCapsule">

            <?php
            $history = $data['get_history'];
            $grouped = [];
            foreach ($history as $item) {
                $date = $item['transaction_register_date'];
                $grouped[$date][] = $item;
            }
            foreach ($grouped as $date => $transactions) {
            ?>
            <!-- Transactions -->
            <div class="section mt-2">
                <div class="section-title">
                    <?php
                    $today = date('Y-m-d');
                    $yesterday = date('Y-m-d', strtotime('-1 day'));
                    $transaction_date = date('Y-m-d', strtotime($date));
                    if ($transaction_date == $today) {
                        echo "Today";
                    } elseif ($transaction_date == $yesterday) {
                        echo "Yesterday";
                    } else {
                        echo date("d-m-Y", strtotime($date));
                    }
                    ?>
                </div>
                <div class="transactions">
                    <?php foreach ($transactions as $transaction) { ?>
                    <!-- item -->
                    <a href="<?php echo base_url(); ?>History/transaction_detail?inv=<?php echo $transaction['transaction_register_id']; ?>" class="item">
                        <div class="detail">
                            <div>
                                <h4><?php echo $transaction['class_name']; ?></h4>
                                <p style="font-weight: bold; font-size: 11px;"><?php echo $transaction['transaction_register_inv']; ?></p>
                            </div>
                        </div>
                        <div class="right">
                            <?php if($transaction['transaction_status'] == 'Pending'){ ?>
                                <p class="price text-primary" style="font-size: 14px;"> <?php echo $transaction['transaction_status']; ?></p>
                            <?php }else if($transaction['transaction_status'] == 'Lunas'){ ?>
                                <p class="price text-success" style="font-size: 14px;"> <?php echo $transaction['transaction_status']; ?></p>
                            <?php }else{ ?>
                                <p class="price text-danger" style="font-size: 14px;"> <?php echo $transaction['transaction_status']; ?></p>
                            <?php } ?>
                        </div>
                    </a>
                    <!-- * item -->
                    <?php } ?>
                </div>
            </div>
            <!-- * Transactions -->
            <?php } ?>

            <?php if (count($history) >= 6) { ?>
            <div class="section mt-2 mb-2">
                <a href="#" id="load-more" class="btn btn-primary btn-block btn-lg">Load More</a>
            </div>
            <?php } ?>


        </div>

    <?php 
    require DOC_ROOT_PATH . $this->config->item('footer1');
    ?>
    <script>
        AddtoHome("2000", "once");

        let offset = 6;
        const limit = 6;

        $('#load-more').on('click', function(e) {
            e.preventDefault();
            $.getJSON('<?php echo base_url(); ?>History/load_more?limit=' + limit + '&offset=' + offset, function(data) {
                if (data.length > 0) {
                    let grouped = {};
                    data.forEach(function(item) {
                        let date = item.transaction_register_date;
                        if (!grouped[date]) grouped[date] = [];
                        grouped[date].push(item);
                    });
                    let html = '';
                    for (let date in grouped) {
                        let transactions = grouped[date];
                        console.log(transactions);
                        let today = new Date().toISOString().split('T')[0];
                        let yesterday = new Date(Date.now() - 86400000).toISOString().split('T')[0];
                        let transaction_date = new Date(date).toISOString().split('T')[0];
                        let title;
                        if (transaction_date === today) {
                            title = 'Today';
                        } else if (transaction_date === yesterday) {
                            title = 'Yesterday';
                        } else {
                            let d = new Date(date);
                            title = ('0' + d.getDate()).slice(-2) + '-' + ('0' + (d.getMonth()+1)).slice(-2) + '-' + d.getFullYear();
                        }
                        html += '<div class="section mt-2"><div class="section-title">' + title + '</div><div class="transactions">';
                        transactions.forEach(function(transaction) {
                            let statusClass = 'text-primary';
                            if (transaction.transaction_status === 'Lunas') statusClass = 'text-success';
                            else if (transaction.transaction_status !== 'Pending') statusClass = 'text-danger';
                            html += '<a href="<?php echo base_url(); ?>History/transaction_detail?inv=' + transaction.transaction_register_id + '" class="item"><div class="detail"><div><h4>' + transaction.class_name + '</h4><p style="font-weight: bold;">' + transaction.transaction_register_inv + '</p></div></div><div class="right"><p class="price ' + statusClass + '" style="font-size: 14px;">' + transaction.transaction_status + '</p></div></a>';
                        });
                        html += '</div></div>';
                    /
                    $('#load-more').parent().before(html);
                    offset += data.length;
                    if (data.length < limit) {
                        $('#load-more').parent().hide();
                    }
                } else {
                    $('#load-more').parent().hide();
                }
            });
        });

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