<?php
include '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendCertificateEmail($studentEmail, $studentName) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aniketkale1563@gmail.com';  // Replace with your email address
        $mail->Password   = 'Aniket@1563Kale';  // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender information
        $mail->setFrom('aniketkale1563@gmail.com', 'Aniket Kale');  // Replace with your name and email address
        $mail->addAddress($studentEmail, $studentName);
        $mail->addReplyTo('your_username@example.com', 'Your Name');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Certificate of Achievement';
        $mail->Body    = file_get_contents('../templates/certificate_template.html');

        // Send email
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST["studentID"];

    $sql = "SELECT * FROM students WHERE id = $studentID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentEmail = $row["email"];
        $studentName = $row["name"];

        if (sendCertificateEmail($studentEmail, $studentName)) {
            echo "Certificate sent successfully!";
        } else {
            echo "Error sending certificate email.";
        }
    } else {
        echo "Student not found!";
    }
}
?>
