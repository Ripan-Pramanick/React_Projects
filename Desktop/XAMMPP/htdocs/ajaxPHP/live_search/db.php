


 <?php 
$conn = new mysqli("localhost", "root", "", "practisdb");

if ($conn->connect_error) {
    die("Connection Failed:".$conn->connect_error);
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// sql insert 
$sql = "INSERT INTO `live_search` (`name`, `email`, `phone`) VALUES (?, ?, ?);";



// stetment query run
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    # code...
    die("Error:".$conn->error);
}

$stmt->bind_param("sss", $name, $email, $phone);

if ($stmt->execute()) {
    # code...
    echo "Record Inserted";
}else{
    echo "Error: ". $stmt->error;
}

// close sql & stmt

$stmt->close();
$conn->close();
?>