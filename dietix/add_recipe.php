<?php
// add_recipe.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $ingredients = $_POST["ingredients"];
    $instructions = $_POST["instructions"];
    $calories = $_POST["calories"];
    $protein = $_POST["protein"];
    $carbs = $_POST["carbs"];
    $fats = $_POST["fats"];
    $vitamins = $_POST["vitamins"];
    $minerals = $_POST["minerals"];
    $user_id = 1;

    $conn = new mysqli("localhost", "root", "", "dietix");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO recipes (user_id, name, ingredients, instructions, calories, protein, carbs, fats, vitamins, minerals) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiiiii", $user_id, $name, $ingredients, $instructions, $calories, $protein, $carbs, $fats, $vitamins, $minerals);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Recipe added successfully!";
}
?>
