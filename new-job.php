<?php

include("connections.php");
function select(){
    global $conn;
    $sql = "SELECT EDUCATION FROM education";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['EDUCATION'] ."'>" . $row['EDUCATION'] ."</option>";
    }
}
    if( isset( $_POST['add_job'])||isset($_POST['add_new_job']) ) {
    session_start();
        $compID = $_SESSION['CompanyID'];
    // build a function to validate data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
        if(!$_POST['job-title']){
         $jobError = "Please enter job title.<br>";
        }else {
        $job = validateFormData( $_POST["job-title"]);
        $_SESSION['job'] = $job;                        
        $jobTitle = mysqli_real_escape_string($conn, $job);
        }
        
        
        if( !$_POST["qualification"] ) {
        $eduError = "Please enter qualification<br>";
        } 
        else {
        $education = $_SESSION['education'] = validateFormData( $_POST["qualification"] );
        }
        
        
        if( !$_POST["course"] ) {
        $courseError = "Please enter course<br>";
        } 
        else {
        $course = $_SESSION['course'] =validateFormData( $_POST["course"] );
        }     
        
        
        if( !$_POST["field"] ) {
        $fieldError = "Please enter field<br>";
        } 
        else {
        $field = $_SESSION['field'] = validateFormData( $_POST["field"] );
        }
        
        
        if(!$_POST['info-name']){
            $jobInfoError = "Please enter job infromation.<br>";
        }
        else{
            $jobinfo = validateFormData($_POST['info-name']);
            $_SESSION['info'] = $jobinfo;
            $jobInfo = mysqli_real_escape_string($conn,$jobinfo);
        }
        
        
        if(!$_POST['address']){ 
            $addressError = "Please enter job infromation.<br>";
        }
        else{
            $address    = validateFormData($_POST['address']);
            $_SESSION['address'] = $address; 
            $jobAddress = mysqli_real_escape_string($conn,$address);
        }
        
        
        if($_POST['percentage']){ 
            if($_POST['percentage']>0 && $_POST['percentage']<=100){
            $percentage = validateFormData($_POST['percentage']);
            $_SESSION['percentage'] = $percentage;    
            }
            else{
            $percentageError = "Please enter percentage between 0 to 100.<br>";
            }
        }
        else{
             $percentage = "Not Specified";
        }
        
        
        if(!$_POST['city']){
            $cityError = "Please enter job infromation.<br>";
        }
        else{
            $city = validateFormData($_POST['city']);
            $_SESSION['city'] = $city;
        }
        
        
        if($_POST['salary']){
            $salary = validateFormData($_POST['salary']);
            $_SESSION['salary'] = $salary;
        }
        else{
            $salary = "Not Specified";
        }
        
        if(!$_POST['date']){
            $dateError = "Please select interview date";
        }
        else{
            $date = validateFormData($_POST['date']);
            $_SESSION['Date'] = $date;
        }
        
        if(!$_POST['empType']){
            $emptypeError = "Please select employment type.<br>";
        }
        else{
            $empType =validateFormData($_POST['empType']);
             $_SESSION['emptype'] = $empType;
        }
        
        if($compID && $jobTitle && $education && $course &&  $field && $jobInfo && $jobAddress && $percentage && $city && $salary && $empType){
            
            $query = "INSERT INTO `jobs`(`ID`, `cID`, `JOB`,`QUALIFICATION`, `COURSE`, `FIELD`, `INFO`, `ADDRESS`, `MINMARKS`, `SALARY`,`DATE`, `EMPTYPE`, `CITY`) VALUES ('','$compID','$jobTitle','$education','$course','$field','$jobInfo','$jobAddress','$percentage','$salary','$date','$empType','$city')";
            
            if(mysqli_query($conn, $query)){
                if($_POST['checkbox']=="yes"){
                     echo "<div class='alert alert-success'>Your job has been posted successfully</div>";
                }
                else{
//                    session_unset();
//                     session_destroy();
            header('Location:company-profile.php');
//                    echo "<div class='alert alert-success'>Your job has been posted successfully</div>";
                }
                
            }
            else{
                echo "<div class='alert alert-danger'>Your Request cannot be completed . Please check your internet connection or try again later</div>";
            }
        }
    }

?>
<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add New Job</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!--        StyleSheet-->   
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

 <link href="style.css" rel="stylesheet">
        

    </head>
    
    <body>
        <div class="container">
        <h1 class="page-heading">Add Your Job</h1>
            
<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Job Title*:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Job Title" name="job-title" value="<?php echo $_SESSION['job']; ?>" >
    <small class="text-danger"><?php echo $jobError; ?></small>
    </div>
</div>
    <br>
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Qualification*:</p>
      </div>
    <div class="col-md-3"> 
        <select name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control">
            <option></option>
     <?php select();?>
        </select>
        <small class="text-danger"><?php echo $eduError; ?></small>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-3">
        <select name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control">
            <option></option>
        </select>
         <small class="text-danger"><?php echo $courseError; ?></small>
    </div>
    <div id="selectDiv3" class="col-md-3">
        <select name="field" id="selectThree" class="js-example-placeholder-single js-states form-control">
            <option></option>
        </select>
        <small class="text-danger"><?php echo $fieldError; ?></small>
    </div>
  </div>
    <br>
<div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Job Information*:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Job Information" name="info-name" value="<?php echo $_SESSION['info']?>" >
    <small class="text-danger"><?php echo $jobInfoError; ?></small>
    </div>
</div>
    <br>
<div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Address*:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Address" name="address"  value="<?php echo $_SESSION['address']?>">
        <small class="text-danger"><?php echo $addressError; ?></small>
    </div>
</div>
    <br>
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Minimum Percentage:</p>
    </div>
    <div class="col-md-4">
    <input type="number" class="form-control edit-profile-inputs" placeholder="Percentage" name="percentage" value="<?php echo $_SESSION['percentage']?>">
    <small class="text-danger"><?php echo $percentageError; ?></small>    
    </div>
          <div class="col-md-1">
      <p class="labels-for-profile">City*:</p>
    </div>
        <div class="col-md-4">
    <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="city" value="<?php echo $_SESSION['city']?>" >
            <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
</div>
    
     <div class="form-row">
       <div class="col-md-2">
      <p class="labels-for-profile">Interview Date*:</p>
      </div>
        <div class="col-md-4">
   <input class="form-control edit-profile-inputs" type="text" id="datepicker" placeholder="-Select Date-" name="date" value="<?php echo $_SESSION['Date'];?>" readonly>
    <small class="text-danger"><?php echo $dateError; ?></small>
        </div>
     <div class="col-md-1">
      <p class="labels-for-profile">Salary:</p>
    </div>
    <div class="col-md-4">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Salary" name="salary" value="<?php echo $_SESSION['salary']?>">
    </div>
</div>
    <br>
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Employment Type*:</p>
    </div>
    <div class="col-md-4">
        <select name="empType" class="edit-profile-inputs">
            <option value="" disabled selected>-Select-</option>
            <option class="edit-profile-inputs" value="Part Time">Part Time</option>
            <option class="edit-profile-inputs" value="Full Time">Full Time</option>
        </select>
        <small class="text-danger"><?php echo $emptypeError; ?></small>
    </div>  
</div>
    <br>
    <div class="form-group">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="checkbox" value="yes">
    <label class="custom-control-label" for="defaultUnchecked">If you want to add same job for different course tick this.</label>
</div>
  </div>
    <button type="submit" class='btn btn-primary' id="submit_job" name="add_job">Add Job</button>
</form>
 </div>   
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="register.js"></script>
        <script type="text/javascript">
            
        </script>
    </body>
</html>
