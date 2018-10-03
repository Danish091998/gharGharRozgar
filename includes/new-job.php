<?php 
function select(){
    global $conn;
    $sql = "SELECT EDUCATION FROM education";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['EDUCATION'] ."'>" . $row['EDUCATION'] ."</option>";
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
        
        <!--        Font Awesome-->
<!--    <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">-->
        <link href="style.css" rel="stylesheet">
        

    </head>
    
    <body>
        <div class="container">
        <h1 class="page-heading">Add Your Job</h1>
            
<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" enctype="multipart/form-data">
    
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Qualification:</p>
      </div>
    <div class="col-md-3"> 
        <select name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control">
            <small class="text-danger"><?php echo $eduError; ?></small>
            <option></option>
     <?php select();?>
        </select>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-3">
        <select name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control">
        <small class="text-danger"><?php echo $courseError; ?></small>
            <option></option>
        </select>
    </div>
    <div id="selectDiv3" class="col-md-3">
        <select name="field" id="selectThree" class="js-example-placeholder-single js-states form-control">
            <small class="text-danger"><?php echo $fieldError; ?></small>
            <option></option>
        </select>
    </div>
  </div>
    <br>
<div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Job Information:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Job Information" name="info-name" required >
    </div>
</div>
    <br>
<div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Address:</p>
    </div>
    <div class="col-md-9">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Address" name="address" required >
    </div>
</div>
    <br>
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Minimum Percentage:</p>
    </div>
    <div class="col-md-4">
    <input type="number" class="form-control edit-profile-inputs" placeholder="Percentage" name="percentage" required >
    </div>
          <div class="col-md-1">
      <p class="labels-for-profile">City:</p>
    </div>
        <div class="col-md-4">
    <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="City" required >
    </div>
</div>
     <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Salary:</p>
    </div>
    <div class="col-md-4">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Salary" name="salary" required >
    </div>
          <div class="col-md-1">
      <p class="labels-for-profile">Role:</p>
    </div>
        <div class="col-md-4">
    <input type="text" class="form-control edit-profile-inputs" placeholder="Role" name="role" required >
    </div>
</div>
    <br>
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-profile">Employment Type:</p>
    </div>
    <div class="col-md-4">
        <select class="edit-profile-inputs">
            <option value="" disabled selected>-Select-</option>
            <option class="edit-profile-inputs">Part Time</option>
            <option class="edit-profile-inputs">Full Time</option>
        </select>
    </div>  
</div>
</form>
 </div>   
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../register.js"></script>        
    </body>
</html>
