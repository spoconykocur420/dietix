<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    die("You must be logged in to get metrics data.");
}

$user_id = $_SESSION["user_id"];
$conn = new mysqli("localhost", "root", "", "meal_planner");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, weight, blood_pressure, blood_sugar_level, physical_activity FROM user_metrics WHERE user_id = ?";
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
    'labels' => array_column($data, 'date'),
    'weights' => array_column($data, 'weight'),
    'blood_pressures' => array_column($data, 'blood_pressure'),
    'blood_sugar_levels' => array_column($data, 'blood_sugar_level'),
    'physical_activities' => array_column($data, 'physical_activity')
];

echo json_encode($response);
?>
