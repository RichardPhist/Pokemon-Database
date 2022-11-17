<?php

include "pokemonClass.php";

$servername = "localhost"; // default server name
$username = "carlo"; // user name that you created
$password = "nmse*CWRqYgk9jxf"; // password that you created
$dbname = "pokemondatabase";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error ."<br>");
} 
echo "Connected successfully <br>";

// Creation of the database
// $sql = "CREATE DATABASE ". $dbname;
// if ($conn->query($sql) === TRUE) {
//     echo "Database ". $dbname ." created successfully<br>";
// } else {
//     echo "Error creating database: " . $conn->error ."<br>";
// }

// close the connection
$conn->close();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $lvar=get_object_vars($a0[0]);
// print_r ($lvar);
	
$sql = "CREATE TABLE Pokemon (
pkey INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Number INT(10) NOT NULL,
Name VARCHAR(30) NOT NULL,
Type1 VARCHAR(20) NOT NULL,
Type2 VARCHAR(20) NOT NULL,
Total INT(6) NOT NULL,
HP INT(3) NOT NULL,
Attack INT(3) NOT NULL,
Defense INT(3) NOT NULL,
SpAtk INT(3) NOT NULL,
SpDef INT(3) NOT NULL,
Speed INT(3) NOT NULL,
Generation INT(3) NOT NULL,
Legendary BOOLEAN NOT NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table Pokemon created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error ."<br>";
}

//Insert different pokemon into the pokemon table
$stmt = $conn->prepare("INSERT INTO Pokemon (Number, Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Speed, Generation, Legendary) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
if ($stmt==FALSE) {
	echo "There is a problem with prepare <br>";
	echo $conn->error; // Need to connect/reconnect before the prepare call otherwise it doesnt work
}
$stmt->bind_param("isssiiiiiiiib", $Number, $Name, $Type1, $Type2, $Total, $HP, $Attack, $Defense, $SpAtk, $SpDef, $Speed, $Generation, $Legendary);

$json_str = file_get_contents("pokemonstats.json");
$poke_arr = json_decode($json_str);
$count = count($poke_arr);

for ($i = 0; $i < $count; $i++) {
    $Number = $poke_arr[$i]->Number;
    $Name = $poke_arr[$i]->Name;
    $Type1 = $poke_arr[$i]->Type1;
    $Type2 = $poke_arr[$i]->Type2;
    $Total = $poke_arr[$i]->Total;
    $HP = $poke_arr[$i]->HP;
    $Attack = $poke_arr[$i]->Attack;
    $Defense = $poke_arr[$i]->Defense;
    $SpAtk = $poke_arr[$i]->SpAtk;
    $SpDef = $poke_arr[$i]->SpDef;
    $Speed = $poke_arr[$i]->Speed;
    $Generation = $poke_arr[$i]->Generation;
    $Legendary = $poke_arr[$i]->Legendary;
    $stmt->execute();
}

$stmt->close();

// close the connection
$conn->close();

?>