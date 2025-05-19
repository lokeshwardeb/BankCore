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

                                   if($get_ac){
                                    if($get_ac->num_rows > 0){
                                        while($row = $get_ac->fetch_assoc()){
                                            $get_cus_id = $row['cus_id'];
                                            $get_balance = $row['balance'];
                                            $ac_type = $row['account_type'];
                                            $ac_status = $row['status'];
                                        }
                                    }else{
                                        $get_balance = '';
                                        $get_balance = '';
                                        $ac_type = '';
                                    }
                                   }

                                      $get_cus = $controllers->get_data_where("customers", " `cus_id` = '$get_cus_id' ");

                                      if($get_cus){
                                        if($get_cus->num_rows > 0){
                                            while($row_cus = $get_cus->fetch_assoc()){
                                                $cus_name = $row_cus['cus_name'];
                                                $cus_image_name = $row_cus['cus_image_name'];
                                            }
                                        }else{
                                            $cus_name = '';
                                            $cus_image_name = '';
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="profile_info">
                                            <div>Account Number : <span><?php echo $get_ac_number; ?></span></div>
                                            <div>Name : <span><?php echo $cus_name; ?></span></div>
                                            <div>Current Balance : <span><?php echo $get_balance; ?></span></div>
                                            <div>Account Status : <span><?php echo $ac_status; ?></span></div>
                                            <div>Account Type : <span><?php 
                                            
                                                if($ac_type == 'student_account'){
                                                    echo 'Student Account';
                                                }elseif($ac_type == 'savings_account'){
                                                    echo 'Savings Account';
                                                }elseif($ac_type == 'business_account'){
                                                    echo 'Business Account';
                                                }
                                            
                                            ?></span></div>
                                            
                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="img-fluid" src="/assets/img/client_image/<?php echo $cus_image_name; ?>" alt="">
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <div class="print_statemanets">
                                            <a href="/transaction_statements?get_ac_number=<?php echo $get_ac_number; ?>">
                                                <button class="btn btn-dark">Print Transaction Statements</button>
                                            </a>
                                        </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="close_ac_section ">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?php echo $get_ac_number ?>" name="ac_number">
                                                <button type="submit" name="close_ac" <?php
                                                
                                                if($ac_status == 'closed'){
                                                    echo 'disabled';
                                                }

                                                ?> class="btn btn-danger">Close Account</button>
                                            </form>
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