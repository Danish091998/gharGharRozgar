<?php
include('connections.php');

if($_POST['check'] == 'select1'){
    $qual = $_POST['qual'];
    $query = "SELECT `COURSE` FROM `course` WHERE `CAT` ='$qual'";
    $result = mysqli_query( $conn, $query );

    while ($row = mysqli_fetch_array($result)){
        $display = $display."<option value='" . $row['COURSE'] ."'>" . $row['COURSE'] ."</option>";
    }   
    echo $display;
}

elseif($_POST['check'] == 'select2'){
    $qual2 = $_POST['qual2'];
    $query = "SELECT `FIELD` FROM `field` WHERE `CAT` ='$qual2'";
    $result = mysqli_query( $conn, $query );

    while ($row = mysqli_fetch_array($result)){
        $display = $display."<option value='" . $row['FIELD'] ."'>" . $row['FIELD'] ."</option>";
    }   
    echo $display;
}

elseif($_POST['check'] == 'select3'){
    $company = $_POST['company'];
    if($_POST['value'] == 'accept'){
        $query ="INSERT INTO `companyRegister` SELECT * FROM `companyRegisterTemporary` WHERE companyName = '$company'";
        $result = mysqli_query( $conn, $query );
        echo "Company's request is accepted succesfully";
        $check = 1;
    }
    
     $query ="DELETE FROM `companyRegisterTemporary` WHERE companyName = '$company'";
        $result = mysqli_query( $conn, $query );
        if($_POST['value'] == 'reject'){
        echo "Company's request is deleted succesfully";
        }
}
    
?>
