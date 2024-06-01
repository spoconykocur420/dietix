<?php
// personalize_plans.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dietary_preferences = $_POST["dietary_preferences"];
    $allergies = $_POST["allergies"];
    $user_id = 1;

    $conn = new mysqli("localhost", "root", "", "dietix");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE users SET dietary_preferences = ?, allergies = ? WHERE id = ?");
    $stmt->bind_param("ssi", $dietary_preferences, $allergies, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Plans personalized successfully!";
}
?>
