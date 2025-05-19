<?php
// session_start();

require_once __DIR__ . '/inc/_header.php';

if (!isset($_GET['get_ac_number'])) {
    echo '
        <script>
            window.location.href="/manage_customers";
        </script>
    ';
}

$get_ac_number = $_GET['get_ac_number'];




// $get_ac_number = $



?>

<script>
    document.title = "BankCore - Account Statements";

</script>

<style>
    table {
        border: none !important;
    }
</style>

<body>
    <main>
        <div class="main_page">
            <div class="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="page " style="height: 100vh;">
                            <?php
                            require_once __DIR__ . '/inc/_sidebar.php';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <div class="status">
                                <?php

                                $controllers->close_ac();

                                $get_ac = $controllers->get_data_where("accounts", " `account_number` = '$get_ac_number' ");

                                if ($get_ac) {
                                    if ($get_ac->num_rows > 0) {
                                        while ($row = $get_ac->fetch_assoc()) {
                                            $get_cus_id = $row['cus_id'];
                                            $get_balance = $row['balance'];
                                            $ac_type = $row['account_type'];
                                            $ac_status = $row['status'];
                                        }
                                    } else {
                                        $get_balance = '';
                                        $get_balance = '';
                                        $ac_type = '';
                                    }
                                }

                                $get_cus = $controllers->get_data_where("customers", " `cus_id` = '$get_cus_id' ");

                                if ($get_cus) {
                                    if ($get_cus->num_rows > 0) {
                                        while ($row_cus = $get_cus->fetch_assoc()) {
                                            $cus_name = $row_cus['cus_name'];
                                        }
                                    } else {
                                        $cus_name = '';
                                    }
                                }


                                ?>
                            </div>
                        </div>
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 fw-bold fst-italic p-4">
                                    Account Holder <span class="text-primary">Profile</span>
                                </div>
                            </div>
                        </div>

                        <div class="ac_profiles_main">
                            <div class="container">
                                <div class="ac_profiles page m-4 p-4 rounded-4">
                                    <div class="profile_information">
                                        <div class="profile_info">
                                            <div>Account Number : <span><?php echo $get_ac_number; ?></span></div>
                                            <div>Name : <span><?php echo $cus_name; ?></span></div>
                                            <div>Current Balance : <span><?php echo $get_balance; ?></span></div>
                                            <div>Account Status : <span><?php echo $ac_status; ?></span></div>
                                            <div>Account Type : <span><?php

                                                                        if ($ac_type == 'student_account') {
                                                                            echo 'Student Account';
                                                                        } elseif ($ac_type == 'savings_account') {
                                                                            echo 'Savings Account';
                                                                        } elseif ($ac_type == 'business_account') {
                                                                            echo 'Business Account';
                                                                        }

                                                                        ?></span></div>

                                        </div>

                                        <div class="transaction_statements">

                                            <div class="manage_custmers_main">
                                                <div class="container">
                                                    <div class="manage_customers page m-4 p-4 rounded-4">
                                                        <table class="table mb-4" id="datatable_info_table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Reference ID</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Transaction Type</th>
                                                                    <th scope="col">Transaction Date</th>
                                                                    <th scope="col">Transaction Date</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                // $result_get_cus_data = $controllers->get_data("customers");
                                                                $result_get_cus_data = $controllers->get_data_where("transactions", " `account_number` = '$get_ac_number' ");

                                                                if ($result_get_cus_data) {
                                                                    if ($result_get_cus_data->num_rows > 0) {
                                                                        // that means the table is not blank

                                                                        $sl_no = 1;

                                                                        while ($row_cus_data = $result_get_cus_data->fetch_assoc()) {
                                                                            echo '
                                                                                <tr class="hover_table" >
                                                                                    <th scope="row">' . $sl_no . '</th>
                                                                                    <td>' . $row_cus_data['reference_id'] . '</td>
                                                                                    <td>' . $row_cus_data['amount'] . '</td>
                                                                                    <td>' . $row_cus_data['transaction_type'] . '</td>
                                                                                    <td>' . $row_cus_data['transaction_date'] . '</td>
                                                                                    <td>' . $row_cus_data['transaction_date'] . '</td>
                                                                                    
                                                                                    
                                                                                    

                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                </tr>
                                                                            ';
                                                                            $sl_no++;
                                                                        }
                                                                    }else{
                                                                        echo '
                                                                            <div>
                                                                                No transaction was found
                                                                            </div>
                                                                        ';
                                                                    }
                                                                }

                                                                // <a href="'. $row_cus_data['cus_id'] .'"> <button class="btn btn-danger" >Delete</button></a>

                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php
    require_once __DIR__ . '/inc/_footer_script.php';

    ?>