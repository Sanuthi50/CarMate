<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../config/constants.php');

// Validate database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching new users count
$newUsersSql = "SELECT COUNT(*) as count, date as date FROM booking GROUP BY date";
$newUsersResult = $conn->query($newUsersSql);

if (!$newUsersResult) {
    die("Query failed: " . $conn->error);
}

$newUsersData = [];
while ($row = $newUsersResult->fetch_assoc()) {
    $newUsersData[$row['date']] = $row['count'];
}

// Check if new user data is empty
if (empty($newUsersData)) {
    echo "No new users found.";
}

// Fetching sessions by location
$locationSessionsSql = "SELECT Vehicle_Model, COUNT(*) as sessions FROM booking GROUP BY Vehicle_Model";
$locationSessionsResult = $conn->query($locationSessionsSql);

if (!$locationSessionsResult) {
    die("Query failed: " . $conn->error);
}

$locationSessionsData = [];
while ($row = $locationSessionsResult->fetch_assoc()) {
    $locationSessionsData[$row['Vehicle_Model']] = $row['sessions'];
}

// Check if location sessions data is empty
if (empty($locationSessionsData)) {
    echo "No sessions by location found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>User Analytics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .chart-container {
            max-width: 800px;
            margin: 0 auto 40px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        canvas {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>User Analytics</h1>
    <div class="chart-container">
        <canvas id="userAnalyticsChart" width="400" height="200"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="sessionLocationChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Convert PHP arrays to JavaScript
        var newUserLabels = <?php echo json_encode(array_keys($newUsersData)); ?>;
        var newUserData = <?php echo json_encode(array_values($newUsersData)); ?>;

        var locationLabels = <?php echo json_encode(array_keys($locationSessionsData)); ?>;
        var locationData = <?php echo json_encode(array_values($locationSessionsData)); ?>;

        console.log(newUserLabels, newUserData);  // Debugging output
        console.log(locationLabels, locationData); // Debugging output

        document.addEventListener('DOMContentLoaded', function() {
            // User Analytics Chart
            var ctx = document.getElementById('userAnalyticsChart').getContext('2d');
            var userAnalyticsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: newUserLabels,
                    datasets: [{
                        label: 'New Users',
                        data: newUserData,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Session by Location Chart
            var ctx2 = document.getElementById('sessionLocationChart').getContext('2d');
            var sessionLocationChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: locationLabels,
                    datasets: [{
                        label: 'Sessions',
                        data: locationData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
