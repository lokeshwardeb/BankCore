<?php

session_start();

// $_SESSION['alert_message'] = '';

require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new controllers;

$controllers->check_login();


?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wireflow || Dashboard </title>

    <!-- favicon icon logo -->
    <link rel="shortcut icon" href="/assets/img/club_logo.jpg" type="image/x-icon">

    <!-- bootstrap css files -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">
     <!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css
https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css
    https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css -->

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css"> -->



    <!-- custom css files -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/alert.js"></script>




</head>

<body>