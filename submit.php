
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "traveldb";

// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$members = $_POST['members'];
$address = $_POST['address'];
$payment = $_POST['payment'];
$paymentMethod = $_POST['paymentMethod'];
$price = $_POST['price'];

// Insert into bookings table
$sql = "INSERT INTO bookings (name, email, phone, members, address, payment, payment_method, price)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssisissi", $name, $email, $phone, $members, $address, $payment, $paymentMethod, $price);

if ($stmt->execute()) {
    echo "<script>alert('Booking successful!'); window.location.href='trip1.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
