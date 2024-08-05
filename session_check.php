<?php
session_start();
require 'dashboard/config.php';

if (isset($_SESSION['user_id']) && isset($_SESSION['session_token'])) {
    $userId = $_SESSION['user_id'];
    $sessionToken = $_SESSION['session_token'];

    // Check if the session token is valid
    $query = "SELECT session_token FROM sessions WHERE user_id='$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $session = mysqli_fetch_assoc($result);
        if ($session['session_token'] !== $sessionToken) {
            // Token mismatch, log out
            session_unset();
            session_destroy();
            header("Location: index.php?msg=session_expired");
            exit();
        }
    } else {
        // Session not found, log out
        session_unset();
        session_destroy();
        header("Location: index.php?msg=session_not_found");
        exit();
    }
} else {
    // No session, redirect to login
    header("Location: index.php");
    exit();
}

mysqli_close($conn);
?>
