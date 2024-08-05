<?php
session_start();
require 'dashboard/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user['password']) {
            // Create a new session token
            $sessionToken = bin2hex(random_bytes(32));

            // Invalidate previous sessions for the user
            $userId = $user['id'];
            $invalidateQuery = "DELETE FROM sessions WHERE user_id='$userId'";
            mysqli_query($conn, $invalidateQuery);

            // Insert new session
            $insertQuery = "INSERT INTO sessions (user_id, session_token) VALUES ('$userId', '$sessionToken')";
            mysqli_query($conn, $insertQuery);

            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['session_token'] = $sessionToken;

            echo "Login successful!";
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "No user found with that email!";
    }
}
?>
