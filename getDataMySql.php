<?php

include "pokemonClass.php";

//performs on load of home page 

// open and load the content of the database
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
    
// Selection of data 
$sql = "SELECT * FROM Pokemon";
$result = $conn->query($sql);
$i = 0;
$arr = Array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
    $allPokemon = new Pokemon();
    $allPokemon->Number = ($row["Number"]);
    $allPokemon->Name = ($row["Name"]);
    $allPokemon->Type1 = ($row["Type1"]);
    $allPokemon->Type2 = ($row["Type2"]);
    $allPokemon->Total = ($row["Total"]);
    $allPokemon->HP = ($row["HP"]);
    $allPokemon->Attack = ($row["Attack"]);
    $allPokemon->Defense = ($row["Defense"]);
    $allPokemon->SpAtk = ($row["SpAtk"]);
    $allPokemon->SpDef = ($row["SpDef"]);
    $allPokemon->Speed = ($row["Speed"]);
    $allPokemon->Generation = ($row["Generation"]);
    $allPokemon->Legendary = ($row["Legendary"]);
    $allPokemon->Image = ($row["Image"]);

    $arr[$i] = $allPokemon;
    $i ++;
    }
    
    echo json_encode($arr);
} else {
    $bad1=[ 'bad' => 1];
    echo json_encode($bad1);	
}


?>