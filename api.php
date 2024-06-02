<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dietix";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$endpoint = $_GET['endpoint'];

switch ($endpoint) {
    case 'meals':
        $sql = "SELECT * FROM meals";
        break;
    case 'meal_plans':
        $sql = "SELECT * FROM meal_plans";
        break;
    case 'meal_tracking':
        $sql = "SELECT * FROM meal_tracking";
        break;
    case 'recipes':
        $sql = "SELECT * FROM recipes";
        break;
    case 'users':
        $sql = "SELECT * FROM users";
        break;
    case 'user_metrics':
        $sql = "SELECT * FROM user_metrics";
        break;
    default:
        echo json_encode(["error" => "Invalid endpoint"]);
        exit();
}

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} 

echo json_encode($data);

$conn->close();
?>
