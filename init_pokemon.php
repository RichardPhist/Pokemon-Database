<?php

include "pokemonClass.php";

$servername = "localhost"; // default server name
$username = "carlo"; // user name that you created
$password = "nmse*CWRqYgk9jxf"; // password that you created
$dbname = "PKMDB";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error ."<br>");
} 
echo "Connected successfully <br>";

// Creation of the database
$sql = "CREATE DATABASE ". $dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database ". $dbname ." created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error ."<br>";
}

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
Number INT(30) NOT NULL,
Name VARCHAR(30) NOT NULL,
Type1 VARCHAR(20) NOT NULL,
Type2 VARCHAR(100) NOT NULL,
Total INT(10) NOT NULL,
HP INT(10) NOT NULL,
Attack INT(10) NOT NULL,
Defense INT(10) NOT NULL,
SpAtk INT(10) NOT NULL,
SpDef INT(10) NOT NULL,
Speed INT(10) NOT NULL,
Generation INT(10) NOT NULL,
Legendary VARCHAR(20) NOT NULL
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
$stmt->bind_param("isssiiiiiiiis", $Number, $Name, $Type1, $Type2, $Total, $HP, $Attack, $Defense, $SpAtk, $SpDef, $Speed, $Generation, $Legendary);

for ($i=0;$i<$n;$i++) {
    $individual = new Pokemon();
    echo $individual->Display() . "<br>";
    // set parameters and execute
    $Number = $individual->Number;
    $Name = $individual->Name;
    $Type1 = $individual->Type1;
    $Type2 = $individual->Type2;
    $Total = $individual->Total;
    $HP = $individual->HP;
    $Attack = $individual->Attack;
    $Defense = $individual->Defense;
    $SpAtk = $individual->SpAtk;
    $SpDef = $individual->SpDef;
    $Speed = $individual->Speed;
    $Generation = $individual->Generation;
    $Legendary = $individual->Legendary;
    echo "New record ". $i ." created successfully<br>";
}

$stmt->close();

// close the connection
$conn->close();

?>