
<?php
include '../config.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Roll Number:</strong> " . $row["roll_number"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Validated:</strong> " . ($row["validated"] ? "Yes" : "No") . "</p>";
        echo "<button onclick='validateStudent(" . $row["id"] . ")'>Validate</button>";
        echo "<button onclick='sendCertificate(" . $row["id"] . ")'>Send Certificate</button>";
        echo "</div>";
    }
} else {
    echo "No records found";
}

$conn->close();
?>
