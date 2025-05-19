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
    "/edit_customer" => __DIR__ . "/views/pages/view.edit_customer.php",
    "/create_new_account" => __DIR__ . "/views/pages/view.create_new_account.php",
    "/manage_accounts" => __DIR__ . "/views/pages/view.manage_accounts.php",
    "/view_ac_profile" => __DIR__ . "/views/pages/view.account_profile.php",
    "/deposit" => __DIR__ . "/views/pages/view.deposit.php",
    "/deposit_interface" => __DIR__ . "/views/pages/view.deposit_interface.php",
    "/withdraw" => __DIR__ . "/views/pages/view.withdraw.php",
    "/withdraw_interface" => __DIR__ . "/views/pages/view.withdraw_interface.php",
    "/transfer" => __DIR__ . "/views/pages/view.transfer.php",
    "/transfer_interface" => __DIR__ . "/views/pages/view.transfer_interface.php",


    // "/" => __DIR__ . "/views/pages/view.login.php",

    

];

// applying the conditions
if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/views/error_pages/views.error.php';
}






?>