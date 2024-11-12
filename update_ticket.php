<?php
include('db.php'); // Include the database connection

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    // Fetch the current ticket details
    $sql = "SELECT * FROM tickets WHERE id = $ticket_id";
    $result = $conn->query($sql);
    $ticket = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $status = $_POST['status'];

        // Update the ticket status in the database
        $update_sql = "UPDATE tickets SET status = '$status' WHERE id = $ticket_id";
        if ($conn->query($update_sql) === TRUE) {
            header("Location: manage_tickets.php");
        } else {
            echo "Error updating ticket: " . $conn->error;
        }
    }

    $conn->close(); // Close the connection
} else {
    header("Location: manage_tickets.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ticket Status</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="update-form">
        <h2>Update Ticket Status</h2>
        <form action="" method="POST">
            <label for="status">Current Status: <?php echo $ticket['status']; ?></label>
            <select name="status" id="status" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
            <button type="submit" name="update">Update Status</button>
        </form>
    </div>
</body>
</html>
