<?php

// Include the menu and database configuration files
include('Partials/Menu.php');

// Fetch available services from the database
$query_services = "SELECT * FROM services"; // Assuming 'services' is your table name
$result_services = mysqli_query($conn, $query_services);


if (!$result_services) {
    die("Query Failed: " . mysqli_error($conn)); // Handle query error
}

?>
<body>

<link rel="stylesheet" href="style.css">

<heading>
    <h1>Car Service Booking</h1>
</heading>

<main>
    <section class="booking-form">
        <h2>Book Your Service</h2>
        <form id="bookingForm" method="POST" action="booking.php">
            <label for="serviceType">Select Service Type:</label>
            <select id="serviceType" name="serviceType" required>
                <?php if (mysqli_num_rows($result_services) > 0): ?>
                    <?php while ($row_service = mysqli_fetch_assoc($result_services)): ?>
                        <?php $p_id = $row_service['provider_id']?>
                        <option value="<?php echo $row_service['name']; ?>">
                            <?php echo $row_service['name']; ?>
                        </option>
                    <?php endwhile; ?>
                <?php else: ?>
                    <option value="">No services available</option>
                <?php endif; ?>
            </select>

           
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Select Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="customerName">Your Name:</label>
            <input type="text" id="customerName" name="customerName" required>

            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" name="contact" required>

            <label for="vehicle">Vehicle Model:</label>
            <input type="text" id="vehicle" name="vehicle" required>

            <button type="submit">Book Now</button>
        </form>
    </section>
</main>

                
<?php

$c_id = $_SESSION['user_id'];
$status = "ordered";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $serviceType = $_POST['serviceType'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $customerName = $_POST['customerName'];
  $contact = $_POST['contact'];
  $vehicle = $_POST['vehicle'];

  // Check for any empty fields
  if (empty($serviceType) || empty($date) || empty($time) || empty($customerName) || empty($contact) || empty($vehicle)) {
      echo "All fields are required.";
  } else {
      // Prepare SQL query to insert booking data into the database
      $query = "INSERT INTO booking (Service_Type, date, time, Name, Contact_Number, Vehicle_Model,c_id,p_id,status) 
                VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";

      // Create a prepared statement
      if ($stmt = $conn->prepare($query)) {
          // Bind the form data to the SQL query
          $stmt->bind_param("sssssssss", $serviceType, $date, $time, $customerName, $contact, $vehicle, $c_id,$p_id,$status);

          // Execute the query
          if ($stmt->execute()) {
              echo "<div class='success'>Booking Succesful..!</div>";
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

// Close the database connection
$conn->close();
?>
<?php
// Include configuration and menu files
include('Partials/footer.php');
?>
