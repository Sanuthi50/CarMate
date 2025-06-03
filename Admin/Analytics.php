<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="Main-content">
    <div class="wrapper">
        <h1>ADMIN DASHBOARD</h1>
        <br>

        <?php
        if(isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>

        <!-- Analytics Cards -->
        <div class="analytics">
            <div class="col-4 text-center">
                <?php
                $sql = "SELECT * FROM provider";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                <br>
                No. of Service Providers
            </div>

            <div class="col-4 text-center">
                <?php
                $sql2 = "SELECT * FROM customer";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                No. of Customers
            </div>

          
            <div class="col-4 text-center">
                <?php
                $sql3 = "SELECT * FROM booking";
                $res3 = mysqli_query($conn, $sql2);
                $count3 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                No.of Bookings
            </div>

            <div class="clearfix"></div>
        </div>

        <!-- Analytics Charts -->
        <div class="charts">
            <h2>User and Session Analytics</h2>
            <canvas id="userAnalyticsChart"></canvas>

            <h2>Session by Location</h2>
            <canvas id="sessionLocationChart"></canvas>
        </div>
    </div>
</div>
<!-- Main content section ends -->

<!-- Add Chart.js for graph visualizations -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // User Analytics Chart
    var ctx = document.getElementById('userAnalyticsChart').getContext('2d');
    var userAnalyticsChart = new Chart(ctx, {
        type: 'line', // You can use 'bar' for bar chart
        data: {
            labels: ['Jun 10', 'Jun 11', 'Jun 12', 'Jun 13', 'Jun 14', 'Jun 15', 'Jun 16', 'Jun 17', 'Jun 18', 'Jun 19', 'Jun 20'], // Add your dates dynamically
            datasets: [{
                label: 'New Users',
                data: [10, 5, 3, 8, 7, 6, 0, 5, 4, 9, 10], // Replace with dynamic data
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }, {
                label: '28-day Active Users',
                data: [43, 42, 41, 43, 44, 45, 43, 42, 43, 44, 43], // Replace with dynamic data
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
            labels: ['Paranaque', 'Quezon City', 'Pasay', 'Muntinlupa'], // Replace with location names from DB
            datasets: [{
                label: 'Sessions',
                data: [30, 20, 10, 5], // Replace with dynamic data from DB
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Active Users',
                data: [15, 10, 5, 2], // Replace with dynamic data from DB
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
</script>

<?php include('partials/Footer.php') ?>