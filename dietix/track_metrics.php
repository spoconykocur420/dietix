<?php
// track_metrics.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $weight = $_POST["weight"];
    $blood_pressure = $_POST["blood_pressure"];
    $blood_sugar_level = $_POST["blood_sugar_level"];
    $physical_activity = $_POST["physical_activity"];
    $user_id = 1;

    $conn = new mysqli("localhost", "root", "", "dietix");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO user_metrics (user_id, date, weight, blood_pressure, blood_sugar_level, physical_activity) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisss", $user_id, $date, $weight, $blood_pressure, $blood_sugar_level, $physical_activity);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Metrics tracked successfully!";
}
?>
