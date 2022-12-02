<?php
echo "IM IN THE POST";
if(isset($_POST['Number'])){
    $num_insert = $_POST['Number'];
}
if(isset($_POST['Name'])){
    $name_insert = $_POST['Name'];
}
if(isset($_POST['Type1'])){
    $type1_insert = $_POST['Name'];
}
if(isset($_POST['Type2'])){
    $type2_insert = $_POST['Type2'];
}
if(isset($_POST['Total'])){
    $tot_insert = $_POST['Total'];
}
if(isset($_POST['HP'])){
    $hp_insert = $_POST['HP'];
}
if(isset($_POST['Attack'])){
    $atk_insert = $_POST['Attack'];
}
if(isset($_POST['Defense'])){
    $def_insert = $_POST['Defense'];
}
if(isset($_POST['SpAtk'])){
    $spatk_insert = $_POST['SpAtk'];
}
if(isset($_POST['SpDef'])){
    $spdef_insert = $_POST['SpDef'];
}
if(isset($_POST['Speed'])){
    $spd_insert = $_POST['Speed'];
}
if(isset($_POST['Legendary'])){
    $leg_insert = $_POST['Legendary'];
}
if(isset($_POST['Generation'])){
    $gen_insert = $_POST['Generation'];
}
if(isset($_POST['Image'])){
    $img_insert = $_POST['Image'];
}

$conn = new mySqli('localhost', 'root', '', 'pokemondatabase');

$sql = "UPDATE Pokemon SET 
Number = '$num_insert',
Name = '$num_insert',
Type1 = '$type1_insert',
Type2 = '$type2_insert',
Total = '$tot_insert',
HP = '$hp_insert',
Attack = '$atk_insert',
Defense = '$def_insert',
SpAtk = '$spatk_insert',
SpDef = '$spdef_insert',
Speed = '$spd_insert',
Legendary = '$leg_insert',
Generation = '$gen_insert',
Image = '$img_insert',
WHERE Number = '$name_insert'
";

//updates database with new information
$result = $conn->query($sql);
echo $result;
$conn->close();
header("location: database.html");
?>