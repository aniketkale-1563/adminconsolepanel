<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST["studentID"];

    // Validate student ID (you may implement more secure validation)
    if (!empty($studentID)) {
        // Redirect to the view certificate page with the student ID
        header("Location: view_certificate.php?studentID=" . urlencode($studentID));
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Student Login</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Student Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="studentID">Student ID:</label>
                <input type="text" class="form-control" id="studentID" name="studentID" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
