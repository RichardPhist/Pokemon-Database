<?php
include "pokemonClass.php";

$conn = new mySqli('localhost', 'root', '', 'pokemondatabase');

if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $num_updating = $_POST['save_num'];
    $name_insert = $_POST['save_name'];
    $type1_insert = $_POST['save_type1'];
    $type2_insert = $_POST['save_type2'];
    $tot_insert = $_POST['save_tot'];
    $hp_insert = $_POST['save_hp'];
    $atk_insert = $_POST['save_atk'];
    $def_insert = $_POST['save_def'];
    $spatk_insert = $_POST['save_spatk'];
    $spdef_insert = $_POST['save_spdef'];
    $spd_insert = $_POST['save_spd'];
    $gen_insert = $_POST['save_gen'];
    (int)$leg_insert = $_POST['save_leg'];
    
    $sql = 'SELECT Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Speed, Generation, Legendary FROM pokemon WHERE `Number`=?';
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $num_updating);
        $checkExecute = mysqli_stmt_execute($stmt);
        if($checkExecute == true){
            
            mysqli_stmt_bind_result($stmt, $currName, $currT1, $currT2, $currTot, $currHp, $currAtk, $currDef, $currSpAtk, $currSpDef, $currSpd, $currGen, $currLeg);
            if(mysqli_stmt_fetch($stmt)){
                mysqli_stmt_free_result($stmt);

                $sql = "UPDATE pokemon SET Name=?, Type1=?, Type2=?, Total=?, HP=?, Attack=?, Defense=?, SpAtk=?, SpDef=?, Speed=?, Generation=?, Legendary=? WHERE `Number`=?";
                if($stmt = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($stmt, "sssiiiiiiiiii", $name_insert, $type1_insert, $type2_insert, $tot_insert, $hp_insert, $atk_insert, $def_insert, $spatk_insert, $spdef_insert, $spd_insert, $gen_insert, $leg_insert, $num_updating);
                    if(mysqli_stmt_execute($stmt)){
                        echo "Updating pokemon is good";
                    }
                    else{
                        echo "Updating pokemon broke.";
                    }
                }
            }
        }
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
    }
}
$conn->close();

header("location: database.html");

?>