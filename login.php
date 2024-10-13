<?php
// Connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Use an empty string for no password
$dbname = "eaz-ifi+wifi+management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the login form
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

// Hash the entered password (use password_hash during registration)
$hashedPassword = hash('sha256', $enteredPassword);

// Query the database to check if the user exists
$sql = "SELECT * FROM login WHERE username='$enteredUsername' AND password='$hashedPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, login successful
    echo "Login successful!";
} else {
    // User doesn't exist or incorrect password
    echo "Invalid username or password";
}

// Close connection
$conn->close();
?>
