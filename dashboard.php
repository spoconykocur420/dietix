<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Dashboard Posiłków</h1>
    <div class="chart-container">
        <canvas id="mealsChart"></canvas>
    </div>

    <h1>Dashboard Nawyki Żywieniowe</h1>
    <div class="chart-container">
        <canvas id="habitChart"></canvas>
    </div>

    <h1>Dashboard Postępów</h1>
    <div class="chart-container">
        <canvas id="progressChart"></canvas>
    </div>

    <h1>Dashboard Personalizacji</h1>
    <div class="chart-container">
        <canvas id="personalizationChart"></canvas>
    </div>

    <script>
        async function fetchData(endpoint) {
            const response = await fetch(`api.php?endpoint=${endpoint}`);
            const data = await response.json();
            return data;
        }

        async function createMealDashboard() {
            const meals = await fetchData('meals');
            const mealNames = meals.map(meal => meal.name);
            const mealCalories = meals.map(meal => meal.calories);
            
            const ctx = document.getElementById('mealsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: mealNames,
                    datasets: [{
                        label: 'Kaloryczność posiłków',
                        data: mealCalories,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        async function createHabitDashboard() {
            const mealTracking = await fetchData('meal_tracking');
            const mealIds = mealTracking.map(track => track.meal_id);
            const mealCounts = {};
            
            mealIds.forEach(id => {
                mealCounts[id] = (mealCounts[id] || 0) + 1;
            });
            
            const ctx = document.getElementById('habitChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(mealCounts),
                    datasets: [{
                        label: 'Spożywane posiłki',
                        data: Object.values(mealCounts),
                        backgroundColor: Object.keys(mealCounts).map(() => `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`),
                        borderColor: Object.keys(mealCounts).map(() => `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        }

        async function createProgressDashboard() {
            const userMetrics = await fetchData('user_metrics');
            const dates = userMetrics.map(metric => metric.date);
            const weights = userMetrics.map(metric => metric.weight);
            
            const ctx = document.getElementById('progressChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Waga użytkownika',
                        data: weights,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });
        }

        async function createPersonalizationDashboard() {
            const mealPlans = await fetchData('meal_plans');
            const planNames = mealPlans.map(plan => plan.name);
            const planDurations = mealPlans.map(plan => new Date(plan.end_date) - new Date(plan.start_date));
            
            const ctx = document.getElementById('personalizationChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: planNames,
                    datasets: [{
                        label: 'Czas trwania planu (dni)',
                        data: planDurations.map(duration => duration / (1000 * 60 * 60 * 24)),
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        createMealDashboard();
        createHabitDashboard();
        createProgressDashboard();
        createPersonalizationDashboard();
    </script>
</body>
</html>
