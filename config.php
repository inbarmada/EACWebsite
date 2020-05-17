<?php
$servername = "sql107.epizy.com";
$username = "epiz_24750853";
$password = "b0wJ3MqisvR2M";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>
