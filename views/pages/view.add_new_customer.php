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
                                    $controllers->add_new_customer();
                                ?>
                            </div>
                        </div>
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 fw-bold fst-italic p-4">
                                    Add new <span class="text-primary">customer</span>
                                </div>
                            </div>
                        </div>

                        <div class="customer_form">
                            <div class="container">
                                <div class="form page m-4 p-4 rounded-4">
                                    <form action="" method="post">
                                        <div class="mb-3 pt-2">
                                            <label for="cus_name">Customer Name</label>
                                            <input type="text" class="form-control" name="cus_name" id="cus_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cus_email">Customer Email</label>
                                            <input type="email" class="form-control" name="cus_email" id="cus_email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cus_phone">Customer Phone no</label>
                                            <input type="number" class="form-control" name="cus_phone" id="cus_phone">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="add_new_customer" class="btn btn-outline-primary mt-4">Login</button>
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