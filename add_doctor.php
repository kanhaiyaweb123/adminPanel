<?php
include 'config.php';
// include 'session_check.php';
$firstName = $_POST['FirstName'];
$lastName = $_POST['lastname'];
$email = $_POST['email'];
$phoneNumber = $_POST['phonenumber'];
$docType = $_POST['doctype'];

$stmt = $conn->prepare("INSERT INTO doctor_details (First_Name, Last_Name, Email, phone_number, doc_type) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $email, $phoneNumber, $docType);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
