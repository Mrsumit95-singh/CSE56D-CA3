<?php
include('db.php'); // Include the database connection

if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $description = $_POST['description'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO tickets (customer_name, email, issue, description) 
            VALUES ('$name', '$email', '$issue', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Ticket submitted successfully! We'll get back to you shortly.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Ticket</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Submit a Support Ticket</h2>
        <form action="submit_ticket.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="customer_name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="issue">Issue Title:</label>
            <input type="text" id="issue" name="issue" required>

            <label for="description">Issue Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit" name="submit">Submit Ticket</button>
        </form>
    </div>
</body>
</html>
