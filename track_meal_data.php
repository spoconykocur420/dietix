<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    die("You must be logged in to get meal data.");
}

$user_id = $_SESSION["user_id"];
$conn = new mysqli("localhost", "root", "", "meal_planner");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT consumption_date, SUM(calories * portion_size) as total_calories 
        FROM meal_tracking mt
        JOIN meals m ON mt.meal_id = m.id
        WHERE mt.user_id = ?
        GROUP BY consumption_date";
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
    'labels' => array_column($data, 'consumption_date'),
    'data' => array_column($data, 'total_calories')
];

echo json_encode($response);
?>
