<?php
// session_start();

require_once __DIR__ . '/inc/_header.php';



$session_name = "withdraw_session_ad_user_" . $_SESSION['admin_user_id'];


if(isset($_SESSION[$session_name])){
    // if there has any deposit session exists then destroy it immedieately
    unset($_SESSION[$session_name]);
}




?>


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
                                    $controllers->enter_withdraw_interface();
                                ?>
                            </div>
                        </div>
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 fw-bold fst-italic p-4">
                                    Withdraw Money From The Customer <span class="text-primary">Account</span>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="customer_form">
                            <div class="container">
                                <div class="form page m-4 p-4 rounded-4">
                                    <form action="" method="post">
                                        <div class="mb-3 pt-2">
                                            <label for="ac_number">Please enter the account number</label>
                                            <input type="text" class="form-control" name="ac_number" id="ac_number">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="cus_email">Customer Email</label>
                                            <input type="email" class="form-control" name="cus_email" id="cus_email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cus_phone">Customer Phone no</label>
                                            <input type="number" class="form-control" name="cus_phone" id="cus_phone">
                                        </div> -->

                                        <div class="mb-3">
                                            <button type="submit" name="enter_withdraw_interface" class="btn btn-outline-primary mt-4">Enter into the withdraw interface</button>
                                        </div>

                                    </form>
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