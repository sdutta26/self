
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "traveldb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM bookings ORDER BY booking_time DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f5f5f5; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        a.back { display: inline-block; margin-top: 20px; background: #007bff; padding: 10px 15px; color: #fff; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Booking Dashboard</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Destination</th>
            <th>Date</th>
            <th>Members</th>
            <th>Message</th>
            <th>Time</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['destination'] ?></td>
            <td><?= $row['travel_date'] ?></td>
            <td><?= $row['number_of_people'] ?></td>
            <td><?= $row['message'] ?></td>
            <td><?= $row['booking_time'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a class="back" href="trip1.html">← Back to Booking</a>
</body>
</html>

<?php $conn->close(); ?>
