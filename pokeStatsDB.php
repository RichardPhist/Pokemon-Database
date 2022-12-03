<?php
include "pokemonClass.php";

function get_all_pokemon(){ //performs on load of page
    $conn = new mysqli('localhost', 'root', '', 'pokemondatabase');
    $all_pokemon = Array();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error ."<br>");
    } 

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $sql = "SELECT * FROM Pokemon";
            $result = $conn->query($sql);
            //echo $result->num_rows;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $newPokemon = new Pokemon();
                    $newPokemon->Number=($row['Number']);
                    $newPokemon->Name=($row['Name']);
                    $newPokemon->Type1=($row['Type1']);
                    $newPokemon->Type2=($row['Type2']);
                    $newPokemon->Total=($row['Total']);
                    $newPokemon->HP=($row['HP']);
                    $newPokemon->Attack=($row['Attack']);
                    $newPokemon->Defense=($row['Defense']);
                    $newPokemon->SpAtk=($row['SpAtk']);
                    $newPokemon->SpDef=($row['SpDef']);
                    $newPokemon->Speed=($row['Speed']);
                    $newPokemon->Generation=($row['Generation']);
                    $newPokemon->Legendary=($row['Number']);
                    echo "CHECKING IF IMAGE IS EMPTY: ".$newPokemon->Image=($row['Image']);
                }
            } else {
                echo "Error selecting all pokemon: " . $conn->error ."<br>";
            }
    }
    $all_pokemon = json_encode($newPokemon);
    echo $all_pokemon;
    $conn->close();
}

// function get_single_pokemon(){ //performs on press of GET
//     $conn = new mysqli('localhost', 'root', '', 'pokemondatabase');
//     $all_pokemon = Array();

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error ."<br>");
//     } 

//     if($_SERVER['REQUEST_METHOD'] == 'GET'){
//         $sql = "SELECT * FROM Pokemon";
//             $result = $conn->query($sql);
//             //echo $result->num_rows;
//             if ($result->num_rows > 0) {
//                 while($row = $result->fetch_assoc()){
//                     $newPokemon = new Pokemon();
//                     $newPokemon->Number=($row['Number']);
//                     $newPokemon->Name=($row['Name']);
//                     $newPokemon->Type1=($row['Type1']);
//                     $newPokemon->Type2=($row['Type2']);
//                     $newPokemon->Total=($row['Total']);
//                     $newPokemon->HP=($row['HP']);
//                     $newPokemon->Attack=($row['Attack']);
//                     $newPokemon->Defense=($row['Defense']);
//                     $newPokemon->SpAtk=($row['SpAtk']);
//                     $newPokemon->SpDef=($row['SpDef']);
//                     $newPokemon->Speed=($row['Speed']);
//                     $newPokemon->Generation=($row['Generation']);
//                     $newPokemon->Legendary=($row['Number']);
//                     echo "CHECKING IF IMAGE IS EMPTY: ".$newPokemon->Image=($row['Image']);
//                 }
//             } else {
//                 echo "Error selecting all pokemon: " . $conn->error ."<br>";
//             }
//     }
//     $all_pokemon = json_encode($newPokemon);
//     echo $all_pokemon;
//     $conn->close();
// }

function get_single_pokemon(){ //performs on press of GET
    $conn = new mysqli('localhost', 'root', '', 'pokemondatabase');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error ."<br>");
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['findme'])){
            $sql = "SELECT * FROM Pokemon WHERE `Number` = ".$_POST['findme'];
            //gives result of query (1 row)
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $newPokemon = new Pokemon();
                    $newPokemon->Number=($row['Number']);
                    $newPokemon->Name=($row['Name']);
                    $newPokemon->Type1=($row['Type1']);
                    $newPokemon->Type2=($row['Type2']);
                    $newPokemon->Total=($row['Total']);
                    $newPokemon->HP=($row['HP']);
                    $newPokemon->Attack=($row['Attack']);
                    $newPokemon->Defense=($row['Defense']);
                    $newPokemon->SpAtk=($row['SpAtk']);
                    $newPokemon->SpDef=($row['SpDef']);
                    $newPokemon->Speed=($row['Speed']);
                    $newPokemon->Generation=($row['Generation']);
                    $newPokemon->Legendary=($row['Legendary']);
                    $newPokemon->Image=($row['Image']);
                }
            } else {
                echo "Error selecting pokemon: " . $conn->error ."<br>";
            }
        }
    }
    $single_pokemon = json_encode($newPokemon);
    echo $single_pokemon;
    $conn->close();
}

get_single_pokemon();
?>