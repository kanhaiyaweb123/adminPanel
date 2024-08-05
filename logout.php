<?php
session_start();
require 'dashboard/config.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Remove the session token from the database
    $query = "DELETE FROM sessions WHERE user_id='$userId'";
    mysqli_query($conn, $query);

    // Unset and destroy session
    session_unset();
    session_destroy();

    header("Location: index.php?msg=logged_out");
    exit();
}
?>
