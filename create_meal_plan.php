<?php
// create_meal_plan.php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $user_id = 1;
    
    $conn = new mysqli("localhost", "root", "", "dietix");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("INSERT INTO meal_plans (user_id, name, start_date, end_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $name, $start_date, $end_date);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    echo "Meal plan created successfully!";
}
?>
