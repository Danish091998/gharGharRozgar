<?php
include('connections.php');
session_start();
$user = $_SESSION['userEmail'];
if($user){
    $query  = "SELECT * FROM users2 WHERE EMAIL ='$user'";
    $result     = mysqli_query($conn, $query);
    $row        = mysqli_fetch_array($result);
    
    $city             = $row['city'];
    $qual             = $row['education'];
    $course           = $row['course'];
    $field            = $row['field'];
    $percentage       = $row['percentage'];

    $jobsQuery = "SELECT jobs.cID, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,companyRegister.LOGOIMAGE,companyRegister.NAME,jobs.ID
    FROM jobs
    INNER JOIN companyRegister
    ON jobs.cID = companyRegister.ID WHERE jobs.CITY = '$city' AND jobs.MINMARKS <= '$percentage' AND jobs.QUALIFICATION = '$qual' AND jobs.COURSE IN ('$course','Not Specified') AND jobs.FIELD  IN ('$field','Not Specified') ORDER BY `ID` DESC";
        $jobsResult = mysqli_query($conn, $jobsQuery);
        if(mysqli_num_rows($jobsResult)){
        
            if($qual == '12th'){
                $userSkillsArray  = array();
                $userSkillsQuery  = "SELECT `SKILL` FROM `userSkills` WHERE `USERID` = '$user'";
                $userSkillsResult = mysqli_query($conn,$userSkillsQuery);
                
                while($userSkill = mysqli_fetch_array($userSkillsResult)){
                    array_push($userSkillsArray,$userSkill['SKILL']);
                }

                while($org = mysqli_fetch_array($jobsResult)){
                $jid = $org['ID'];
                $compSkillsQuery  = "SELECT `SKILL` FROM `compSkills` WHERE `JOBID` = '$jid'";
                $compSkillsResult = mysqli_query($conn, $compSkillsQuery);
                
                $compSkillsArray = array();
                
                while($skill = mysqli_fetch_array($compSkillsResult)){
                    array_push($compSkillsArray,$skill['SKILL']);
                }
                if (count(array_intersect($userSkillsArray,$compSkillsArray)) == count($compSkillsArray)){
                
                $remjob =  "SELECT jobs.cID, jobs.JOB, companyRegister.ID, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,companyRegister.LOGOIMAGE,companyRegister.NAME,jobs.ID
                    FROM jobs
                    INNER JOIN companyRegister
                    ON jobs.cID = companyRegister.ID WHERE jobs.ID = $jid";
                    $remresult = mysqli_query($conn, $remjob);
                    $org1 = mysqli_fetch_array($remresult);

                        $job_id         = $org1['ID'];
                        $org_name       = $org1['NAME'];
                        $org_logo       = $org1['LOGOIMAGE'];
                        $org_job        = $org1['JOB'];
                        $job_course     = $org1['COURSE'];
                        $job_field      = $org1['FIELD'];
                        $job_info       = $org1['INFO'];
                        $job_venue      = $org1['ADDRESS'];
            
                        if($org['SALARY'] != "Not Specified"){
                                    $job_salary = "&#8377 ".$org1['SALARY'];
                                }
                        else{
                            $job_salary = $org1['SALARY'];
                        }
            
                        $job_emp_type   = $org1['EMPTYPE'];
            
                        echo "<div class=' row job-display-wrapper'> 
                                <div class='col-xs-3 logo-image-wrapper'>
                                    <img src='$org_logo' class='logo-image'>
                                </div>
                            <div class='col-xs-3 job-details-wrapper'>
                                <span class = 'job-name'>$org_job</span><br>
                                <span class = 'company-name'>$org_name</span><br>
                                <span class = 'venue'><i id='location-icon' class='fas fa-map-marker-alt'></i>$job_venue</span><br>
                                </div>
                                <div class='col-xs-3 salary-wrapper'>
                                <span class = 'company-name'> $job_salary</span><br>
                                <span style='color:#38b63d' class = 'company-name'> $job_emp_type</span>
                                </div>
                                <div class='col-xs-3'>
                                <a class='know-more' href='job-display.php?job=$job_id'>View More</a>
                                </div>
                            </div>";

                    }
                }
            }   

    else{
        while($org = mysqli_fetch_array($jobsResult)){
            $job_id         = $org['ID'];
            $org_name       = $org['NAME'];
            $org_logo       = $org['LOGOIMAGE'];
            $org_job        = $org['JOB'];
            $job_course     = $org['COURSE'];
            $job_field      = $org['FIELD'];
            $job_info       = $org['INFO'];
            $job_venue      = $org['ADDRESS'];

            if($org['SALARY'] != "Not Specified"){
                        $job_salary = "&#8377 ".$org['SALARY'];
                    }
            else{
                $job_salary = $org['SALARY'];
            }

            $job_emp_type   = $org['EMPTYPE'];

            echo "<div class=' row job-display-wrapper'> 
                    <div class='col-xs-3 logo-image-wrapper'>
                        <img src='$org_logo' class='logo-image'>
                    </div>
                <div class='col-xs-3 job-details-wrapper'>
                    <span class = 'job-name'>$org_job</span><br>
                    <span class = 'company-name'>$org_name</span><br>
                    <span class = 'venue'><i id='location-icon' class='fas fa-map-marker-alt'></i>$job_venue</span><br>
                    </div>
                    <div class='col-xs-3 salary-wrapper'>
                    <span class = 'company-name'> $job_salary</span><br>
                    <span style='color:#38b63d' class = 'company-name'> $job_emp_type</span>
                    </div>
                    <div class='col-xs-3'>
                    <a class='know-more' href='job-display.php?job=$job_id'>View More</a>
                    </div>
                </div>";
            }
        }
    }
    else{
        echo "<div class='alert alert-info'>There are no jobs to display for you. Please Check again later.</div>";
    }
}


?>
