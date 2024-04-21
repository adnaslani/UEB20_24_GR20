<?php


session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
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

// Retrieve and sanitize the submitted answer
$answer = $_POST['answer'];
$answer = $conn->real_escape_string($answer);

// Retrieve the corresponding question ID
$questionId = $_POST['question_id'];

// Update the question with the provided answer
$sql = "UPDATE questions SET answer = '$answer', answered = 1 WHERE id = $questionId";

if ($conn->query($sql) === TRUE) {
  echo "Answer submitted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
header("Location: index.php");
exit();
?>
