<?php

session_start();
session_destroy();
session_unset();
// unset($_SESSION['admin_username']);

header("location: /");


?>