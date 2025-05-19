<?php
// session_start();

require_once __DIR__ . '/inc/_header.php';


if (!isset($_GET['get_cus_id'])) {
    echo '
        <script>
            window.location.href="/manage_customers";
        </script>
    ';
}

$get_cus_id = $_GET['get_cus_id'];





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
                                $controllers->edit_customer();
                                ?>
                            </div>
                        </div>
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 rounded-4 fs-5 fw-bold fst-italic p-4">
                                    Edit <span class="text-primary">customer</span>
                                </div>
                            </div>
                        </div>

                        <?php

                        $get_cus = $controllers->get_data_where("customers", " `cus_id` = '$get_cus_id' ");

                        $get_cus_name = '';
                        $get_cus_email = '';
                        $get_cus_phone = '';

                        if ($get_cus) {
                            if ($get_cus->num_rows > 0) {
                                while ($row = $get_cus->fetch_assoc()) {
                                    $get_cus_name = $row['cus_name'];
                                    $get_cus_email = $row['cus_email'];
                                    $get_cus_phone = $row['cus_phone'];
                                }
                            } else {
                                $get_cus_name = '';
                                $get_cus_email = '';
                                $get_cus_phone = '';
                            }
                        }


                        ?>

                        <div class="customer_form">
                            <div class="container">
                                <div class="form page m-4 p-4 rounded-4">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="mb-3 pt-2">
                                            <label for="cus_name">Customer Name</label>
                                            <input type="text" class="form-control" value="<?php echo $get_cus_name; ?>" name="cus_name" id="cus_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cus_email">Customer Email</label>
                                            <input type="email" class="form-control" value="<?php echo $get_cus_email; ?>" name="cus_email" id="cus_email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cus_phone">Customer Phone no</label>
                                            <input type="number" class="form-control" value="<?php echo $get_cus_phone; ?>" name="cus_phone" id="cus_phone">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cus_phone">Customer Image</label>
                                            <input type="file" class="form-control" value="<?php echo $get_cus_phone; ?>" name="cus_image" id="cus_image">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="update_customer" class="btn btn-outline-primary mt-4">Update</button>
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