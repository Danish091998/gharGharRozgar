<?php
include('connections.php');

if($_POST['check'] == 1){
$qual = $_POST['qual'];
$query = "SELECT `COURSE` FROM `course` WHERE `CAT` ='$qual'";
$result = mysqli_query( $conn, $query );
    
while ($row = mysqli_fetch_array($result)){
    $display = $display."<option value='" . $row['COURSE'] ."'>" . $row['COURSE'] ."</option>";
}   
echo $display;
}
else{
    $qual2 = $_POST['qual2'];
$query = "SELECT `FIELD` FROM `field` WHERE `CAT` ='$qual2'";
$result = mysqli_query( $conn, $query );
    
while ($row = mysqli_fetch_array($result)){
    $display = $display."<option value='" . $row['FIELD'] ."'>" . $row['FIELD'] ."</option>";
}   
echo $display;

}
?>
