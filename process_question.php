<?php
session_start();

// Check if the user is logged in as a customer
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "customer") {
  // Redirect to the login page or display an error message
  header("Location: login.php");
  exit();
}

// Connect to the database
$servername = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'onlinestore';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize the submitted question
$question = $_POST['question'];
$question = $conn->real_escape_string($question);

// Insert the question into the database
$sql = "INSERT INTO questions (question) VALUES ('$question')";

if ($conn->query($sql) === TRUE) {
  echo "Question submitted successfully!";
  echo "<br>";
  echo "<a href='faq.php' class='btn btn-primary'>Return to FAQ Page</a>";
  echo "<br>";
  echo "<a href='index.php' class='btn btn-primary'>Go to Home Page</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

