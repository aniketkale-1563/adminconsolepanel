<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST["studentID"];

    $sql = "UPDATE students SET validated = 1 WHERE id = $studentID";

    if ($conn->query($sql) === TRUE) {
        echo "Student validated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
