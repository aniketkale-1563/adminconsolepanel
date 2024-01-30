<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST["studentID"];

    $sql = "SELECT * FROM students WHERE id = $studentID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: view_certificate.php?student_id=$studentID");
        exit();
    } else {
        echo "Invalid student ID. Please try again.";
    }
}
?>
