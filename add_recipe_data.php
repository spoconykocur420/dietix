<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    die("You must be logged in to get recipe data.");
}

$user_id = $_SESSION["user_id"];
$conn = new mysqli("localhost", "root", "", "meal_planner");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, calories, protein, carbs, fats FROM recipes WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

$response = [
    'labels' => array_column($data, 'name'),
    'calories' => array_column($data, 'calories'),
    'protein' => array_column($data, 'protein'),
    'carbs' => array_column($data, 'carbs'),
    'fats' => array_column($data, 'fats')
];

echo json_encode($response);
?>
