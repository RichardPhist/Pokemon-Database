<?php

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

if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $num_insert = $_POST['num'];
    $name_insert = $_POST['name'];
    $type1_insert = $_POST['type1'];
    $type2_insert = $_POST['type2'];
    $tot_insert = $_POST['tot'];
    $hp_insert = $_POST['hp'];
    $atk_insert = $_POST['atk'];
    $def_insert = $_POST['def'];
    $spatk_insert = $_POST['spatk'];
    $spdef_insert = $_POST['spdef'];
    $spd_insert = $_POST['spd'];
    $gen_insert = $_POST['gen'];
    (int)$leg_insert = $_POST['leg'];
    $img_insert = $_POST['img'];

    $sql = "INSERT INTO Pokemon (Number, Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Speed, Generation, Legendary, Image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "isssiiiiiiiiis", $num_insert, $name_insert, $type1_insert, $type2_insert, $tot_insert, $hp_insert, $atk_insert, $def_insert, $spatk_insert, $spdef_insert, $spd_insert, $gen_insert, $leg_insert, $img_insert);

        if(mysqli_execute($stmt)){
            echo "Inserting new pokemon is good.";
        }
        else{
            echo "Inserting new pokemon broke";
        }
    }
}
?>