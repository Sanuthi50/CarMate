<?php
// Include configuration and menu files
include('Partials/Menu.php');

// Check if user is logged in before using session data
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$user_id = $_SESSION['user_id']; // Store session user ID

// Use a prepared statement to prevent SQL injection
$query = "SELECT * FROM booking WHERE c_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Error handling for failed query
if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Service Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<section id="home">
    <h1>Welcome to Your Car Service Platform</h1>
    <p>Find the best car service providers near you and book your appointments easily.</p>
</section>

<section id="services">
    <h2>Available Services</h2>
</section>

<section id="bookings">
    <h2>My Bookings</h2>

    <?php
    // Check if there are any bookings to display
    if ($result->num_rows > 0): ?>
        <ul id="booking-list">
            <?php
            // Fetch each row from the query result
            while ($row = $result->fetch_assoc()) {
                // Store booking details in variables
                $id = $row['id'];
                $service_type = $row['Service_Type'];
                $date = $row['date'];
                $time = $row['time'];
                $contact_number = $row['Contact_Number'];
                $vehicle_model = $row['Vehicle_Model'];
                $status = $row['status']; // Fixed case
            ?>
                <!-- Display booking details -->
                <li>
                    <strong>Order Number:</strong> <?php echo $id; ?><br>
                    <strong>Service Type:</strong> <?php echo $service_type; ?><br>
                    <strong>Date:</strong> <?php echo $date; ?><br>
                    <strong>Time:</strong> <?php echo $time; ?><br>
                    <strong>Contact Number:</strong> <?php echo $contact_number; ?><br>
                    <strong>Vehicle Model:</strong> <?php echo $vehicle_model; ?><br>
                    <strong>Order Status:</strong> <?php echo $status; ?><br>
                </li>
                <hr>
            <?php } ?>
        </ul>
    <?php else: ?>
        <!-- Display message if no bookings are found -->
        <p>No bookings found.</p>
    <?php endif; ?>
</section>

<section id="contact">
    <h2>Contact Us</h2>
    <p>If you have any questions, feel free to reach out to us at support@example.com.</p>

    <!-- Add Image Button for Chatbot -->
    <form action="http://localhost/New/Chatbot/index.html" method="post">
        <button type="submit" class="image-button">
            <img src="../Pic/chat.jpg" alt="Contact Us" />
        </button>
    </form>
</section>

<!-- Feedback Form -->
<section id="feedback-form" style="margin-top: 20px;">
    <h2 style="color: #333;">Leave Your Feedback</h2>
    <form action="http://localhost/New/Customer/index.php" method="POST">
        <textarea name="feedback_text" rows="4" cols="50" required placeholder="Enter your feedback here..." style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc;"></textarea><br>
        <button type="submit" style="margin-top: 10px; padding: 10px 15px; border: none; border-radius: 5px; background-color:#da042a; color: #fff; cursor: pointer;">Submit Feedback</button>
    </form>
</section>

<?php
// Handle feedback form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback_text'])) {
    // Retrieve the form data
    $feedback = $_POST['feedback_text'];

    // Check if feedback is empty
    if (empty($feedback)) {
        echo "All fields are required.";
    } else {
        // Get the current timestamp
        $current_time = date("Y-m-d H:i:s");

        // Prepare SQL query to insert feedback data and timestamp into the database
        $query = "INSERT INTO feedback (Feedback, Date) VALUES (?, ?)";
        if ($stmt = $conn->prepare($query)) {
            // Bind the form data and current time to the SQL query
            $stmt->bind_param("ss", $feedback, $current_time);

            // Execute the query
            if ($stmt->execute()) {
                echo "<div class='success'>Feedback Submitted Successfully!</div>";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}


?>
<?php
// Query to fetch feedback data from the database
$query2 = "SELECT*FROM feedback ORDER BY Date DESC";

// Execute the query
$result = mysqli_query($conn, $query2);

// Error handling for failed query
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<section id="customer-feedbacks">
    <h2>Customer Feedback</h2>

    <?php
    // Check if there are any feedbacks to display
    if (mysqli_num_rows($result) > 0): ?>
        <ul id="feedback-list">
            <?php
            // Fetch each row from the query result
            while ($row = mysqli_fetch_assoc($result)) {
                // Store feedback details in variables
                $feedback = $row['Feedback'];
                $feedback_date = $row['Date'];
            ?>
                <!-- Display feedback details -->
                <li>
                    <p><strong>Feedback:</strong> <?php echo $feedback; ?></p>
                    <p><small><strong>Date:</strong> <?php echo $feedback_date; ?></small></p>
                </li>
                <hr>
            <?php } ?>
        </ul>
    <?php else: ?>
        <!-- Display message if no feedbacks are found -->
        <p>No feedbacks found.</p>
    <?php endif; ?>
</section>


<?php
// Include configuration and menu files
include('Partials/footer.php');
?>
