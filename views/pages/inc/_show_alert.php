<?php


// session_start();

// Check if the session variable is set
if (isset($_SESSION['alert_message'])) {
    $alertMessage = $_SESSION['alert_message'];
    
    // Display the alert using JavaScript
    echo "<script>alert('$alertMessage');</script>";
    
    // Clear the session variable to prevent the message from showing again
    unset($_SESSION['alert_message']);
}


?>