<?php
session_start();

require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new controllers;

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
    <main>
        <div class="container">
           <?php

           $controllers->admin_login();


           ?>
        </div>
        <div class="container mt-5 pt-5 ">
            <div class="container page rounded-4  login_page bg-white mb-4  mt-4 p-4 m-auto w-50">
                <div class="software_title text-center ">
                    <h1>Bank<span class="text-primary">Core</span></h1>
                    <p class="fs-6 fst-italic ">BankCore - Secure. Scalable. Smarter Banking.</p>
                </div>
                <form action="" method="post">
                    <div class="mb-3 pt-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="admin_login" class="btn btn-outline-primary mt-4">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </main>

        <!-- bootstrap script files -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- custom scripts files -->
    <script src="/assets/js/scripts.js"></script>

</body>
</html>