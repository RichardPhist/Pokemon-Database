<?php

include "pokemonClass.php"

$index = $_GET["Index"];

if ($index!=-1) {
	// open and load the content of the database
	$servername = "localhost"; // default server name
	$username = "carlo"; // user name that you created
	$password = "nmse*CWRqYgk9jxf"; // password that you created
	$dbname = "CorrectPKMDataBase";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

    $sql = "SELECT COUNT (*) AS NumTot FROM Pokemon";
    $result = $conn->query($sql);
    $NumTot = $result->fetch_assoc();
    $NumTot = $NumTot["NumTot"];
    echo ($NumTot . "<br>");
		
	// Selection of data 
	$sql = "SELECT Number, Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Speed, Generation, Legendary FROM Pokemon WHERE pkey=" . $index;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		$row = $result->fetch_assoc(); // Fetch a result row as an associative array
		
		$newPokemon = new Pokemon();
		$newPokemon->$Number = ($row["Number"]);
        $newPokemon->$Name = ($row["Name"]);
        $newPokemon->$Type1 = ($row["Type1"]);
        $newPokemon->$Type2 = ($row["Type2"]);
        $newPokemon->$Total = ($row["Total"]);
        $newPokemon->$HP = ($row["HP"]);
        $newPokemon->$Attack = ($row["Attack"]);
        $newPokemon->$Defense = ($row["Defense"]);
        $newPokemon->$SpAtk = ($row["SpAtk"]);
        $newPokemon->$SpDef = ($row["SpDef"]);
        $newPokemon->$Speed = ($row["Speed"]);
        $newPokemon->$Generation = ($row["Generation"]);
        $newPokemon->$Legendary = ($row["Legendary"]);
		
		echo json_encode($newstudent);
	} else {
		$bad1=[ 'bad' => 1];
		echo json_encode($bad1);	
	}
}

?>