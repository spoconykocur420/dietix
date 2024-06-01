<?php
// set_goals.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $health_goal = $_POST["health_goal"];
    $dietary_preferences = $_POST["dietary_preferences"];
    $allergies = $_POST["allergies"];
    $user_id = 1;

    $conn = new mysqli("localhost", "root", "", "dietix");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE users SET health_goal = ?, dietary_preferences = ?, allergies = ? WHERE id = ?");
    $stmt->bind_param("sssi", $health_goal, $dietary_preferences, $allergies, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Goals set successfully!";
}
?>
