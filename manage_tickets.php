<?php
include('db.php'); // Include the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tickets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="ticket-list">
        <h2>Customer Support Tickets</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Issue</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php
            // Fetch all tickets from the database
            $sql = "SELECT * FROM tickets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["customer_name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["issue"] . "</td>
                            <td>" . $row["status"] . "</td>
                            <td>
                                <a href='update_ticket.php?id=" . $row["id"] . "'>Update Status</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No tickets found</td></tr>";
            }

            $conn->close(); // Close the connection
            ?>
        </table>
    </div>
</body>
</html>
