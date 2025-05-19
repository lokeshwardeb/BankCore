<?php
// session_start();

require_once __DIR__ . '/inc/_header.php';







?>


<body>
    <main>
        <div class="main_page">
            <div class="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="page " style="height: 100vh;" >
                            <?php
                                require_once __DIR__ . '/inc/_sidebar.php';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 p-4">
                                    Welcome back, <span class="text-primary"><?php echo $_SESSION['admin_username'] ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="latest_transactions">
                            <div class="container">
                                <div class="transaction_msg page m-4 mt-5 fs-5 p-4 rounded-4">
                                <div class="msg_section">
                                    Lattest Transactions
                                </div>
                                <div class="sub_msg fs-6">
                                    Here you can find out all the transactions
                                </div>
                            </div>
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

                                                                $result_get_cus_data = $controllers->get_data("transactions");
                                                                // $result_get_cus_data = $controllers->get_data_where("transactions", " `account_number` = '$get_ac_number' ");

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
    </main>

    
<?php
require_once __DIR__ . '/inc/_footer_script.php';

?>
