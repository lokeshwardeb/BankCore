<?php

session_start();

// $_SESSION['alert_message'] = '';

// require_once __DIR__ . '/../../../controllers/controllers.php';

require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new controllers;

// $controllers->check_login();

// $controllers->admin_register();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!-- bootstrap css files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- custom css files -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/alert.js"></script>







</head>
<body>
        <?php

    $controllers->admin_register();


    ?>
    
    <main>
        <div class="container mt-5 pt-5 ">
            <div class="container page rounded-4  login_page bg-white mb-4  mt-4 p-4 m-auto w-50">
                <div class="software_title text-center ">
                    <h1>Bank<span class="text-primary">Core</span></h1>
                    <p class="fs-6 fst-italic ">BankCore - Secure. Scalable. Smarter Banking.</p>
                </div>
                <form action="" method="post">
                    <div class="mb-3 pt-2">
                        <label for="username">Employee Full Name</label>
                        <input type="text" class="form-control "  name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="cpassword">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="register_admin" class="btn btn-outline-primary mt-4">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </main>

        <!-- bootstrap script files -->
    <!-- <script src="/assets/js/bootstrap.min.js"></script> -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- custom scripts files -->
    <script src="/assets/js/scripts.js"></script>
    <!-- <script src="/assets/js/alert.js"></script> -->


</body>
</html>