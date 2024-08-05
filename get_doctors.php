<?php
// include '../session_check.php';
include 'config.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {
    $userId = intval($_POST['userId']);

    $stmt = $conn->prepare("DELETE FROM doctor_details WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
    $stmt->close();
}

$filter = isset($_POST['filter']) ? $conn->real_escape_string($_POST['filter']) : '';

$sql = "SELECT * FROM doctor_details";
if ($filter != '') {
    $sql .= " WHERE doc_type = ?";
}

$stmt = $conn->prepare($sql);

if ($filter != '') {
    $stmt->bind_param("s", $filter);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['First_Name']}</td>
                <td>{$row['Last_Name']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['phone_number']}</td>
                <td>{$row['doc_type']}</td>
                <td><button id='deleteData' class='btn btn-danger' data-id='{$row['id']}'>Delete</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No doctors found</td></tr>";
}

$stmt->close();
$conn->close();
?>
