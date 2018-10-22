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
    $date    = $_POST['date'];
    $time    = $_POST['time'];
   
    $userEmail  = $_SESSION['userEmail'];
    if($userEmail)  {  
    $query = "SELECT * FROM `appliedJobs` WHERE `jobId` ='$job' AND `userEmail` ='$userEmail'";
    $result = mysqli_query( $conn, $query );

        if(mysqli_num_rows($result)>0){
            
            echo "You have already applied for this";
            
            }
        else{            
            $query = "INSERT INTO `appliedJobs`(`userEmail`, `jobId`, `date`, `time`) VALUES ('$userEmail','$job','$date','$time')";
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
    $name   = ucwords(strtolower(mysqli_real_escape_string($conn,$_POST["name"] ))); 
    $fatherName   = ucwords(strtolower(mysqli_real_escape_string($conn,$_POST["fatherName"] ))); 
    $city   = $_POST['city'];
    $email  = $_SESSION['userEmail'];
    
    $query = "UPDATE `users2` SET `name`= '$name', `phone` = '$mobile', `city` = '$city', `fatherName` = '$fatherName' WHERE `email`='$email'";
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

elseif($_POST['check']== "userInfo"){
    session_start();
    $_SESSION['userInfoEmail'] = $_POST['user'];
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
         echo "<a onclick='userInfo()' href='user-information.php' target='_blank' data-user='$email' class='userInfo'>$count &nbsp; $name </a><hr><script>userInfo();</script>";
     }
        
    }
    else{
        echo "No one has applied for this job till now.";
    }
}

elseif($_POST['check'] == 'delete'){
    $id = $_POST['jobId'];

    $query = "SELECT  `DATE`, `TIME` FROM `jobs` WHERE `ID` = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $date = $row['DATE'];
    $time = $row['TIME'];
   
    $start = date_create($date.$time);
    
    $end  = date_create(date("Y-m-d h:i:sa"));
    $diff = date_diff($start,$end);
    $days =  $diff->format("%R%a days");
    if($days >= 1){
        $query  = "DELETE FROM `jobs` WHERE `ID` = '$id';";
        $query  .= "DELETE FROM `appliedJobs` WHERE `jobId` = '$id'";
        if (mysqli_multi_query($conn,$query)){
            echo "deleted";
        }
        else{
            echo "Please check your internet connection and try again.";
        } 
    }

    else{
        echo 'You cannot delete this job because there is less than one day left for interview.';
    }
    
   
}

elseif($_POST['check'] == 'altComp'){
    
    $id      = $_SESSION['CompanyID']; 
    $mobile  = $_POST['mobile'];
    $cname   = mysqli_real_escape_string($conn,$_POST['cname']);
    $city    = $_POST['city'];
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $mobile2 = $_POST['mobile2'];
    $query = "UPDATE `companyRegister` SET `PHONE`='".$mobile."',`PHONESEC`='".$mobile2."',`ADDRESS`='".$address."',`NAME`='".$cname."',`CITY`='".$city."' WHERE `ID` = '".$id."'";
 
    if (mysqli_query($conn,$query)){
        echo "<div class='alert alert-success'>Your profile is updated.</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Please check your internet connection and try again.</div>";
    }    
}

elseif($_POST['check'] == 'altcompPass'){
    $pass     = $_POST['password'];
    $password = password_hash( $pass, PASSWORD_BCRYPT );
    $id       = $_SESSION['CompanyID'];
    
    $query = "UPDATE `companyRegister` SET `password`= '$password' WHERE `ID`='".$id."'";
    if(mysqli_query( $conn, $query )){
        echo "<div class='alert alert-success'>Your password is changed successfully.</div>";
    }
    else{
        echo "<div class='alert alert-danger'>Please check your internet connection or try again later.</div>";
    }      
}


elseif($_POST['check'] == 'forgotPass'){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $key   = md5(uniqid());
    $date  = date("Y-m-d");
    
    $query = "INSERT INTO `forgotPassword`(`EMAIL`, `USERKEY`, `DATE`) VALUES ('$email','$key','$date')";
    $result = mysqli_query($conn,$query);
}

elseif($_POST['check'] == 'forgotPassComp'){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $key   = md5(uniqid());
    $date  = date("Y-m-d");
    
    $query = "INSERT INTO `forgotPassword`(`EMAIL`, `USERKEY`, `DATE`) VALUES ('$email','$key','$date')";
    $result = mysqli_query($conn,$query);
}


?>
