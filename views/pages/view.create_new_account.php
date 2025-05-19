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
                                    $controllers->create_new_account();
                                ?>
                            </div>
                        </div>
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 fw-bold fst-italic p-4">
                                    Create a new <span class="text-primary">account</span>
                                </div>
                            </div>
                        </div>

                        <div class="customer_form">
                            <div class="container">
                                <div class="form page m-4 p-4 rounded-4">
                                    <form action="" method="post">
                                        <div class="mb-3 pt-2">
                                            <label for="cus_id">Customer ID</label>
                                            <input type="text" class="form-control" name="cus_id" id="cus_id">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ac_type">Account Type</label>
                                            <!-- <input type="text" class="form-control" name="ac_type" id="ac_type"> -->
                                            <select class="form-control"t name="ac_type" id="ac_type">
                                                <option value="">Select Account Type</option>
                                                <option value="student_account">Student Account</option>
                                                <option value="savings_account">Savings Account</option>
                                                <option value="business_account">Business Account</option>
                                            </select>
                                        </div>
                                        

                                        <div class="mb-3">
                                            <button type="submit" name="create_new_account" class="btn btn-outline-primary mt-4">Create a new account</button>
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