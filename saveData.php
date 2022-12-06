<?php
include "pokemonClass.php";
echo "IM IN THE PHP";

if($_SERVER["REQUEST_METHOD"] == 'POST'){

}

echo $_POST['test'];
if(isset($_POST['save_num'])){
    $num_insert = $_POST['save_num'];
}else{ 
    echo $num_insert;
    //$num_insert = 0;
}

if(isset($_POST['save_name'])){
    $name_insert = $_POST['save_name'];
    echo $name_insert;
}else{$name_insert = "";}

if(isset($_POST['save_type1'])){
    $type1_insert = $_POST['save_type1'];
}else{$type1_insert = "";}

if(isset($_POST['save_type2'])){
    $type2_insert = $_POST['save_type2'];
}else{$type2_insert = "";}

if(isset($_POST['save_tot'])){
    $tot_insert = $_POST['save_tot'];
}else{$tot_insert = 0;}

if(isset($_POST['save_hp'])){
    $hp_insert = $_POST['save_hp'];
}else{$hp_insert = 0;}

if(isset($_POST['save_atk'])){
    $atk_insert = $_POST['save_atk'];
}else{$atk_insert = 0;}

if(isset($_POST['save_def'])){
    $def_insert = $_POST['save_def'];
}else{$def_insert = 0;}

if(isset($_POST['save_spatk'])){
    $spatk_insert = $_POST['save_spatk'];
}else{$spatk_insert = 0;}

if(isset($_POST['save_spdef'])){
    $spdef_insert = $_POST['save_spdef'];
}else{$spdef_insert = 0;}

if(isset($_POST['save_spd'])){
    $spd_insert = $_POST['save_spd'];
}else{$spd_insert = 0;}

if(isset($_POST['save_leg'])){
    (bool)$leg_insert = $_POST['save_leg'];
}else{$leg_insert = false;}

if(isset($_POST['save_gen'])){
    $gen_insert = $_POST['save_gen'];
}else{$gen_insert = 0;}

if(isset($_POST['save_img'])){
    $img_insert = $_POST['save_img'];
}else{$img_insert = "";}

$conn = new mySqli('localhost', 'root', '', 'pokemondatabase');

/*

USE BIND PARAM FUNCTION

$sql = "UPDATE leaderboard SET `total_games`, `wins`, `time_played`, `turn_count`) VALUES (?,?,?,?)";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "iiii", $new_tot_games, $new_wins, $new_time_played, $new_turn_count);
        }
SOMETHING LIKE THAT

*/

// $sql = "UPDATE Pokemon SET
// `Number` = ".$num_insert",".
// "`Name` = ".$name_insert",".
// "`Type1` = ".$type1_insert",".
// `Type2` = '$type2_insert',
// `Total` = '$tot_insert',
// `HP` = '$hp_insert',
// `Attack` = '$atk_insert',
// `Defense` = '$def_insert',
// `SpAtk` = '$spatk_insert',
// `SpDef` = '$spdef_insert',
// `Speed` = '$spd_insert',
// `Legendary` = '$leg_insert',
// `Generation` = '$gen_insert',
// `Image` = '$img_insert',
// WHERE `Number` = '$num_insert'
// ";

//updates database with new information
$result = $conn->query($sql);
echo $result;
$conn->close();
header("location: database.html");
?>