<?php

// initalizing the path of the server
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



// register routes
$Routes = [

    "/" => __DIR__ . "/views/pages/view.login.php",
    "/login" => __DIR__ . "/views/pages/view.login.php",
    "/logout" => __DIR__ . "/views/pages/view.logout.php",
    "/admin_register" => __DIR__ . "/views/pages/view.admin_register.php",
    "/dashboard" => __DIR__ . "/views/pages/view.dashboard.php",
    "/add_new_customer" => __DIR__ . "/views/pages/view.add_new_customer.php",
    "/manage_customers" => __DIR__ . "/views/pages/view.manage_customers.php",


    // "/" => __DIR__ . "/views/pages/view.login.php",

    

];

// applying the conditions
if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/views/error_pages/views.error.php';
}






?>