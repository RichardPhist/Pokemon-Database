<?php

$servername = "localhost"; // default server name
$username = "carlo"; // user name that you created
$password = "nmse*CWRqYgk9jxf"; // password that you created
$dbname = "pokemondatabase";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] = 'POST'){
    $num_delete = $_POST['num'];

    $sql = 'DELETE FROM pokemon WHERE Number='.$num_delete;
    $conn->query($sql);
    echo "Pokemon with DexNum: ".$num_delete." removed from DB";
}

?>