<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styl.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- create_meal_plan.html -->
<form action="create_meal_plan.php" method="POST">
    <label for="name">Plan Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required><br>
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required><br>
    <button type="submit">Create Meal Plan</button>
</form>
<!-- add_recipe.html -->
<form action="add_recipe.php" method="POST">
    <label for="name">Recipe Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="ingredients">Ingredients:</label>
    <textarea id="ingredients" name="ingredients" required></textarea><br>
    <label for="instructions">Instructions:</label>
    <textarea id="instructions" name="instructions" required></textarea><br>
    <label for="calories">Calories:</label>
    <input type="number" id="calories" name="calories" required><br>
    <label for="protein">Protein (g):</label>
    <input type="number" id="protein" name="protein" required><br>
    <label for="carbs">Carbs (g):</label>
    <input type="number" id="carbs" name="carbs" required><br>
    <label for="fats">Fats (g):</label>
    <input type="number" id="fats" name="fats" required><br>
    <label for="vitamins">Vitamins:</label>
    <textarea id="vitamins" name="vitamins"></textarea><br>
    <label for="minerals">Minerals:</label>
    <textarea id="minerals" name="minerals"></textarea><br>
    <button type="submit">Add Recipe</button>
</form>
<!-- track_meal.html -->
<form action="track_meal.php" method="POST">
    <label for="meal_id">Meal:</label>
    <select id="meal_id" name="meal_id" required>
        <!-- Options should be populated dynamically with meals from the database -->
    </select><br>
    <label for="consumption_date">Date of Consumption:</label>
    <input type="date" id="consumption_date" name="consumption_date" required><br>
    <label for="portion_size">Portion Size:</label>
    <input type="number" id="portion_size" name="portion_size" required><br>
    <button type="submit">Track Meal</button>
</form>
<!-- track_metrics.html -->
<form action="track_metrics.php" method="POST">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
    <label for="weight">Weight (kg):</label>
    <input type="number" id="weight" name="weight" step="0.1" required><br>
    <label for="blood_pressure">Blood Pressure:</label>
    <input type="text" id="blood_pressure" name="blood_pressure"><br>
    <label for="blood_sugar_level">Blood Sugar Level (mg/dL):</label>
    <input type="number" id="blood_sugar_level" name="blood_sugar_level" step="0.1"><br>
    <label for="physical_activity">Physical Activity:</label>
    <textarea id="physical_activity" name="physical_activity"></textarea><br>
    <button type="submit">Track Metrics</button>
</form>
<!-- visualize_progress.html -->
<form action="visualize_progress.php" method="POST">
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required><br>
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required><br>
    <button type="submit">Visualize Progress</button>
</form>
<!-- set_goals.html -->
<form action="set_goals.php" method="POST">
    <label for="health_goal">Health Goal:</label>
    <input type="text" id="health_goal" name="health_goal" required><br>
    <label for="dietary_preferences">Dietary Preferences:</label>
    <textarea id="dietary_preferences" name="dietary_preferences"></textarea><br>
    <label for="allergies">Allergies:</label>
    <textarea id="allergies" name="allergies"></textarea><br>
    <button type="submit">Set Goals</button>
</form>
<!-- personalize_plans.html -->
<form action="personalize_plans.php" method="POST">
    <label for="dietary_preferences">Dietary Preferences:</label>
    <textarea id="dietary_preferences" name="dietary_preferences" required></textarea><br>
    <label for="allergies">Allergies:</label>
    <textarea id="allergies" name="allergies"></textarea><br>
    <button type="submit">Personalize Plans</button>
</form>
<!-- get_recommendations.html -->
<form action="get_recommendations.php" method="POST">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
    <button type="submit">Get Recommendations</button>
</form>

    
</body>
</html>