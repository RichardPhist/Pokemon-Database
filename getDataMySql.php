<?php

//performs on load of the html page

include "pokemonClass.php";

$servername = "localhost"; // default server name
$username = "root"; // user name that you created
$password = ""; // password that you created
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
    
    $newPokemon = new Pokemon();
    $newPokemon->Number = ($row["Number"]);
    $newPokemon->Name = ($row["Name"]);
    $newPokemon->Type1 = ($row["Type1"]);
    $newPokemon->Type2 = ($row["Type2"]);
    $newPokemon->Total = ($row["Total"]);
    $newPokemon->HP = ($row["HP"]);
    $newPokemon->Attack = ($row["Attack"]);
    $newPokemon->Defense = ($row["Defense"]);
    $newPokemon->SpAtk = ($row["SpAtk"]);
    $newPokemon->SpDef = ($row["SpDef"]);
    $newPokemon->Speed = ($row["Speed"]);
    $newPokemon->Generation = ($row["Generation"]);
    $newPokemon->Legendary = ($row["Legendary"]);
    $newPokemon->Image = ($row["Image"]);

    $arr[$i] = $newPokemon;
    $i ++;
    }
    
    echo json_encode($arr);
} else {
    $bad1=[ 'bad' => 1];
    echo json_encode($bad1);	
}

?>