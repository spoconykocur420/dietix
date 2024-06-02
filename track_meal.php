<?php
// track_meal.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meal_id = $_POST["meal_id"];
    $consumption_date = $_POST["consumption_date"];
    $portion_size = $_POST["portion_size"];
    $user_id = 1;

    $conn = new mysqli("localhost", "root", "", "dietix");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO meal_tracking (user_id, meal_id, consumption_date, portion_size) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $user_id, $meal_id, $consumption_date, $portion_size);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Meal tracked successfully!";
}
?>
