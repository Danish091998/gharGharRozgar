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
function selectSkill(){
    global $conn;
    $sql = "SELECT SKILL FROM skills";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['SKILL'] ."'>" . $row['SKILL'] ."</option>";
}
}

  session_start();
  $compID = $_SESSION['CompanyID'];
  if($compID){
    if( isset( $_POST['add_job'])) {
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
        $education = mysqli_real_escape_string($conn,validateFormData( $_POST["qualification"] ));
        }
        
        
        if( !$_POST["course"] ) {
        $courseError = "Please enter course<br>";
        } 
        else {
        $course = mysqli_real_escape_string($conn,validateFormData( $_POST["course"] ));
        }     
        
        
        if( !$_POST["field"] ) {
        $fieldError = "Please enter field<br>";
        } 
        else {
        $field = mysqli_real_escape_string($conn,validateFormData( $_POST["field"] ));
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
            if($_POST['percentage']>0 && $_POST['percentage']<=100 && is_numeric($_POST['percentage'])){
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
            if(is_numeric($_POST['salary'])){
                $_SESSION['salary'] = $_POST['salary'];
                $salary = mysqli_real_escape_string($conn, validateFormData($_POST['salary']));
            }
            else{
                $salaryError = "Please enter numeric value without any special characters.";
            }
        }
        else{
            $salary = "Not Specified";
        }
        
        if(!$_POST['date']){
            $dateError = "Please select interview date";
        }
        else{
            $date = validateFormData($_POST['date']);
            $_SESSION['date'] = $_POST['date'];
            $date = mysqli_real_escape_string($conn,$date);
            
        }
        
        if(!$_POST['timepicker']){
            $timeError = "Please select interview date";
        }
        else{
            $time = validateFormData($_POST['timepicker']);
            $time = str_replace(" ","",$time);
            $_SESSION['time'] = $time;
            $time = mysqli_real_escape_string($conn,$time);    
        }
        
        if(!$_POST['empType']){
            $emptypeError = "Please select employment type.<br>";
        }
        else{
            $empType = mysqli_real_escape_string($conn,validateFormData($_POST['empType']));
             $_SESSION['emptype'] = $empType;
        }
        if($_POST['skills']){
            $skill = ($_POST['skills']);
            $skills = implode(", ", $skill);
        }
        else{
           $skills = "Not Specified";
        }

        if($compID && $jobTitle && $education && $jobInfo && $jobAddress && $percentage && $city && $salary && $empType && $date && $time){
            
    
            $query = "INSERT INTO `jobs`(`ID`, `cID`, `JOB`,`QUALIFICATION`, `COURSE`, `FIELD`, `INFO`, `ADDRESS`, `MINMARKS`, `SALARY`,`DATE`, `TIME` ,`EMPTYPE`, `CITY`,`SKILLS`) VALUES ('','$compID','$jobTitle','$education','$course','$field','$jobInfo','$jobAddress','$percentage','$salary','$date','$time','$empType','$city','$skills')";
            
            if(mysqli_query($conn, $query)){
                if($_POST['checkbox']=="yes"){
                     echo "<div class='alert alert-success'>Your job has been posted successfully</div>";
                }
                else{
                    unset($_SESSION['info'],$_SESSION['address'],$_SESSION['job'],$_SESSION['percentage'],$_SESSION['city'],$_SESSION['date'],$_SESSION['salary'],$_SESSION['time']);

                    echo "<div class='alert alert-success'>Your job has been posted successfully</div>";
                }
                
            }
            else{
                echo "<div class='alert alert-danger'>Your Request cannot be completed . Please check your internet connection or try again later</div>";
            }
        }
    }
}
else{
   echo "<div class='alert alert-danger'>Please Login to post a new job.</div>";   
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
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link href="select2-4.0.6-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!--        StyleSheet-->   
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
<link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" href="ericjgagnon-wickedpicker-2a8950a/dist/wickedpicker.min.css">
 <link href="style.css" rel="stylesheet">
        

    </head>
    
    <body style="padding:20px;">
        <div class="container">
        <h1 class="page-heading" style="margin-bottom:20px;">Add Your Job</h1>
        <p class="edit-profile-inputs" style="margin-bottom:25px;">Fields marked with <span class="asterisk">*</span> are compulsory.</p>
            
<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Job Title<span class="asterisk">*</span>:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Job Title" name="job-title" value="<?php echo $_SESSION['job']; ?>" >
    <small class="text-danger"><?php echo $jobError; ?></small>
    </div>
</div>
    <br>
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Qualification For This Job<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-3"> 
        <select name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control" id="qual">>
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
    <div class="form-row skills-div"> 
                <div class="col-md-2">
      <p class="labels-for-profile">Skills For This Job:</p>
      </div>
    <div class="col-md-3">
        <select name="skills[]" id="skill" class="js-example-placeholder-single js-states" style="width:100%" multiple> 
            <small class="text-danger"><?php echo $skillError; ?></small>
            <option></option>
            <?php selectSkill()?>
        </select>
        
    </div>    
            </div>
    <br>
<div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Job Information<span class="asterisk">*</span>:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Job Information" name="info-name" value="<?php echo $_SESSION['info']?>" >
    <small class="text-danger"><?php echo $jobInfoError; ?></small>
    </div>
</div>
    <br>
<div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Address<span class="asterisk">*</span>:</p>
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
      <p class="labels-for-profile">City<span class="asterisk">*</span>:</p>
    </div>
        <div class="col-md-4">
    <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="city" value="<?php echo $_SESSION['city']?>" >
            <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
</div>
    
     <div class="form-row">
       <div class="col-md-2">
      <p class="labels-for-profile">Interview Date<span class="asterisk">*</span>:</p>
      </div>
        <div class="col-md-4">
   <input class="form-control edit-profile-inputs" type="text" id="datepickerJob" placeholder="-Select Date-" name="date" value="<?php echo $_SESSION['date'];?>" readonly>
    <small class="text-danger"><?php echo $dateError; ?></small>
        </div>
      <div class="col-md-1">
      <p class="labels-for-profile">Interview Time<span class="asterisk">*</span>:</p>
      </div>
        <div class="col-md-4">
        <input style="width:100%" type="text" name="timepicker" class="timepicker edit-profile-inputs" value="<?php $_SESSION['time']?>" readonly/>
            <small class="text-danger"><?php echo $timeError; ?></small>
        </div>
</div>
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Employment Type<span class="asterisk">*</span>:</p>
    </div>
    <div class="col-md-4">
        <select style="width:100%" name="empType" class="edit-profile-inputs">
            <option value="" disabled selected>-Select-</option>
            <option class="edit-profile-inputs" value="Part Time">Part Time</option>
            <option class="edit-profile-inputs" value="Full Time">Full Time</option>
        </select>
        <small class="text-danger"><?php echo $emptypeError; ?></small>
    </div>  
        <div class="col-md-1">
      <p class="labels-for-profile">Salary:</p>
    </div>
    <div class="col-md-4">
    <input type="number" class="form-control edit-profile-inputs" placeholder="Salary" name="salary" value="<?php echo $_SESSION['salary']?>">
        <small class="text-danger"><?php echo $salaryError; ?></small>
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
        
<script src="jquery-3.3.1.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="select2-4.0.6-rc.0/dist/js/select2.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="ericjgagnon-wickedpicker-2a8950a/dist/wickedpicker.min.js"></script>
<script src="register.js"></script>
        <script type="text/javascript">
            $( function() {
    $( "#datepickerJob" ).datepicker({changeYear:true,
                dateFormat:'yy-mm-dd',
                minDate: 0,
                maxDate: "+1y" });
  } );
           var options = { now: "12:00:00", 
                          //hh:mm 24 hour format only, defaults to current time
                          twentyFour: true, 
                          //Display 24 hour format, defaults to false 
                          upArrow: 'wickedpicker__controls__control-up', //The up arrow class selector to use, for custom CSS
                          downArrow: 'wickedpicker__controls__control-down',
                          //The down arrow class selector to use, for custom CSS 
                          close: 'wickedpicker__close',
                          //The close class selector to use, for custom CSS
                          hoverState: 'hover-state', 
                          //The hover state class to use, for custom CSS 
                          title: 'Timepicker', 
                          //The Wickedpicker's title, 
                          showSeconds: false, 
                          //Whether or not to show seconds, 
                          secondsInterval: 1,
                          //Change interval for seconds, defaults to 1  , 
                          minutesInterval: 15,
                          //Change interval for minutes, defaults to 1 
                          beforeShow: null, 
                          //A function to be called before the Wickedpicker is shown 
                          show: null, 
                          //A function to be called when the Wickedpicker is shown 
                          clearable: false, 
                          //Make the picker's input clearable (has clickable "x")  
                         }; 
            $('.timepicker').wickedpicker(options);
        </script>
    </body>
</html>
