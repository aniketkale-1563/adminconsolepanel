<?php
include '../config.php';

if (isset($_GET["student_id"])) {
    $studentID = $_GET["student_id"];

    $sql = "SELECT * FROM students WHERE id = $studentID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentName = $row["name"];
        $rollNumber = $row["roll_number"];
    } else {
        echo "Student not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Certificate</title>
</head>
<body>

    <h2>Certificate of Achievement</h2>
    <p>This is to certify that <?php echo $studentName; ?> has successfully completed the course.</p>
    <p>Roll Number: <?php echo $rollNumber; ?></p>

    <!-- Add more certificate details as needed -->

</body>
</html>
