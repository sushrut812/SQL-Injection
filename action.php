<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SQL Injection form error example</title>
</head>
<body>
<?php
$uid = $_POST['uid'];
$pid = $_POST['passid'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM user_details where userid = '$uid' 
and password = '$pid' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo "id: " . $row["userid"]. " - Password: " . $row["password"]. " " . $row["Age"]. "<br>";
    }
} else {
    echo "0 results";
}



$conn->close();

?>
</body>
</html>
