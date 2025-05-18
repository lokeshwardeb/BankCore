<?php

session_start();

// $_SESSION['alert_message'] = '';

require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new controllers;

$controllers->check_login();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BankCore - Secure. Scalable. Smarter Banking.</title>
    <!-- bootstrap css files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- custom css files -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/alert.js"></script>

</head>

<body>