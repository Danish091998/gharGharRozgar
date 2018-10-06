<?php
include('connections.php');
 session_start();

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

elseif($_POST['check'] == 'jobApply'){
    
    $job     = $_POST['jobId'];
    $cEmail  = $_POST['companyEmail'];
   
    $userEmail  = $_SESSION['userEmail'];
    if($userEmail)  {  
    $query = "SELECT * FROM `appliedJobs` WHERE `jobId` ='$job' AND `userEmail` ='$userEmail'";
    $result = mysqli_query( $conn, $query );

        if(mysqli_num_rows($result)>0){
            echo "You have already applied for this";
            }
        else{
            $query = "INSERT INTO `appliedJobs`(`userEmail`,`companyEmail`,`jobId`) VALUES('$userEmail','$cEmail','$job')";
            if(mysqli_query( $conn, $query )){
                echo "Your application has been received.";
            }
            else{
                echo "Some error occured.Please check your internet connection.";
            }
        }   
}
    
    else{
        echo "Please Login to apply";
    }
}

elseif($_POST['check'] == 'altUser' ){
    
    $mobile = $_POST['mobile'];
    $name   = mysqli_real_escape_string($conn,$_POST['name']);
    $city   = $_POST['city'];
    $email  = $_SESSION['userEmail'];
    
    $query = "UPDATE `users2` SET `name`= '$name', `phone` = '$mobile', `city` = '$city' WHERE `email`='$email'";
    if(mysqli_query( $conn, $query )){
        echo "<div class='alert alert-success'>Successfully Changed</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Please check your internet connection or try again later.</div>";
    }
}

elseif($_POST['check'] == 'altPass' ){
    
    $pass = $_POST['pass'];
    $password = password_hash( $pass, PASSWORD_BCRYPT );
    $email  = $_SESSION['userEmail'];
    
    $query = "UPDATE `users2` SET `password`= '$password' WHERE `email`='$email'";
    if(mysqli_query( $conn, $query )){
        echo "<div class='alert alert-success'>Your password is changed successfully.</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Please check your internet connection or try again later.</div>";
    }
}

elseif($_POST['check'] == 'applicants'){
    
    $id = $_POST['jobId'];
    
    $query = "SELECT appliedJobs.jobId, appliedJobs.userEmail, users2.name, users2.email, users2.password, users2.phone, users2.city, users2.education, users2.percentage, users2.course, users2.field, users2.profilepic, users2.gender, users2.birthDate
     FROM appliedJobs
     INNER JOIN users2
     ON appliedJobs.userEmail = users2.email WHERE appliedJobs.jobId = $id"; 
    
     $result = mysqli_query($conn,$query);
     if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result)){
         $name  = $row['name'];
         $email = $row['email'];
         $phone = $row['phone'];
         $count++;
         echo "
  <tbody>
    <tr>
      <th scope='row'>$count</th>
      <td>$name</td>
      <td>$email</td>
      <td>$phone</td>
    </tr>
  </tbody>";
     }
    }
    else{
        echo "No one has applied for this job till now.";
    }
}

elseif($_POST['check'] == 'delete'){
    $id = $_POST['jobId'];
    
    $query = "DELETE FROM `jobs` WHERE `ID` = '$id'";
 
    if (mysqli_query($conn,$query)){
        echo "deleted";
    }
    else{
        echo "Please check your internet connection and try again.";
    }
    
}
?>
