<!-- INSERT INTO `login` (`id`, `email`, `password`) VALUES (NULL, 'DOUSGAMING4@GMAIL.CO', '$2y$10$2JD2xIpxfuGO9'); -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practisdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = "user@example.com";
$password = "secure_password"; 

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query using placeholders '?'
$sql = "INSERT INTO `login` (`email`, `password`) VALUES (?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

if ($stmt === FALSE) {
  die("Error preparing statement: " . $conn->error);
}
// Bind parameters
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
  echo "New record created successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>