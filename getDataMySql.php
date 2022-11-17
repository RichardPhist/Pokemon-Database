<?php

include "pokemonClass.php";

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
$sql = "SELECT Number, Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Speed, Generation, Legendary FROM Pokemon";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
    $row = $result->fetch_assoc(); // Fetch a result row as an associative array
    
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

    $arr[$i] = $newPokemon;
    $i += 1;
    }
    
    echo json_encode($arr);
} else {
    $bad1=[ 'bad' => 1];
    echo json_encode($bad1);	
}


?>