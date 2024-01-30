
<?php
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Console</title>
</head>
<body>

    <div class="container mt-5">
        <h2>Admin Console</h2>
        
        <h3>Student Details</h3>
        <div id="studentDetails"></div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/script.js"></script>

        <script>
            function validateStudent(studentID) {
                $.ajax({
                    type: "POST",
                    url: "validate_student.php",
                    data: { studentID: studentID },
                    success: function(response) {
                        alert(response);
                        loadStudentDetails();
                    }
                });
            }

            function sendCertificate(studentID) {
                $.ajax({
                    type: "POST",
                    url: "send_certificate.php",
                    data: { studentID: studentID },
                    success: function(response) {
                        alert(response);
                        loadStudentDetails();
                    }
                });
            }

            function loadStudentDetails() {
                $.ajax({
                    type: "GET",
                    url: "get_students.php",
                    success: function(data) {
                        $("#studentDetails").html(data);
                    }
                });
            }

            $(document).ready(function() {
                loadStudentDetails();
            });
        </script>
    </div>

</body>
</html>
