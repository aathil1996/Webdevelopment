<?php
session_start();


// Include config file
require_once "../dbConnection.php";

// Define variables and initialize with empty values
$userID = $jobTitle = $jobIndustryType = $jobType = $cityID = $districtID =$ProvinceID = $salaryRangeID =$contactName =$contactPhone=$contactPosition=$contactEmail="1";
//$username_err="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  //  if (empty($_POST["jobTitle"]) && empty($_POST["cName"])&& empty($_POST["cPhone"])&& empty($_POST["cPosition"]) && empty($_POST["cEmail"])&& empty($_POST['itype'])&& empty($_POST['jobType'])&& empty($_POST['city']) && empty($_POST['district']) && empty($_POST['province'])&& empty($_POST['salaryRange']))
  if (empty($_POST["jobTitle"]) && empty($_POST["cEmail"]))
  {
    //$username_err = "Please enter a jobTitle.";
    echo "Shut up";
  }
  else{
    // Instructions if $_POST['value'] exist

    $jobTitle = trim($_POST["jobTitle"]);
    $contactName= trim($_POST["cName"]);
    $contactPhone= trim($_POST["cPhone"]);
    $contactPosition= trim($_POST["cPosition"]);
    $contactEmail= trim($_POST["cEmail"]);

    $jobIndustryType = trim($_POST['itype']);
    $jobType = trim($_POST['jobType']);
    $cityID =trim($_POST['city']);
    $districtID =trim($_POST['district']);
    $ProvinceID =trim($_POST['province']);
    $salaryRangeID = trim($_POST['salaryRange']);
  }
  if(isset($_SESSION["userID"])){
    //              need to load company welcome page
    $userID = $_SESSION["userID"];
    //  echo $userID;
  }

  $sql1 = "INSERT INTO job_posts (jobID, jobTitle, industryTypeID, jobType, userID, cityID, districtID, ProvinceID, salaryRangeID, contactName, contactPosition, contactPhone, contactEmail) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

  if($result1 = mysqli_prepare($con, $sql1)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($result1, "sssssssssssss",$param_jobID, $param_jobTitle, $param_industryTypeID, $param_jobType, $param_userID, $param_cityID, $param_districtID, $param_ProvinceID, $param_salaryRangeID, $param_contactName, $param_contactPosition, $param_contactPhone, $param_contactEmail);

    //$param_jobID = NULL;
    $param_jobID = NULL;
    $param_jobTitle=$jobTitle;
    $param_industryTypeID=$jobIndustryType;
    $param_jobType=$jobType;
    $param_userID=$userID;
    $param_cityID=$cityID;
    $param_districtID=$districtID;
    $param_ProvinceID=$ProvinceID;
    $param_salaryRangeID=intval($salaryRangeID);
    $param_contactName=$contactName;
    $param_contactPosition=$contactPosition;
    $param_contactPhone=$contactPhone;
    $param_contactEmail=$contactEmail;




    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($result1)){
      // Redirect to login page

      header("location: welcome_jp.php");
    } else{
      echo mysqli_stmt_error($result1);
      echo "[1]Something went wrong. Please try again later.";
    }

  }    else{
    echo "[2]Something went wrong. Please try again later.";
  }



}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Job</title>
  <link rel="stylesheet" href="../css/style_signupjp.css" />

  <style type="text/css">
  body{ font: 14px sans-serif; }
  .wrapper{ width: 350px; padding: 20px; }
  </style>
</head>


<body>
  <?php include '../structure/header.php'; ?>
  <!-- <?php include '../structure/menuBar_organization.php'; ?> -->


  <div class="container">
    <h1><b>Post a new Job</b></h1>
    <p><b>Please fill this form to advertise your job calling</b></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">



      <!--edit this like a headline - subtopic-->
      <hr>
      <h3> <b>Job Details</b></h3>

      <hr>

      <label><b>Job Title</b></label>
      <input type="text"  placeholder="Enter the name of the position" name="jobTitle" required>

      <label>Job Type (Part Time of Full Time)</label>
      <select name="jobType">
        <option value="1">Part Time</option>
        <option value="0">Full Time</option>
        </select


        <label for="itype"><b>Industrial Type</b></label>
        <select name="itype">
          <option value="1">Advertising / PR / MR / Event Management</option>
          <option value="0">Accounting / Finance</option>
          <option value="2">Agriculture / Dairy</option>
          <option value="3">Animation / Gaming</option>
          <option value="4">Architecture / Interior Design</option>
          <option value="5">Automobile / Auto Anciliary / Auto Components</option>
          <option value="6">Aviation / Aerospace Firms</option>
          <option value="7">Banking / Financial Services / Broking</option>
          <option value="8">BPO / Call Centre / ITES</option>
          <option value="9">Brewery / Distillery</option>
          <option value="10">Ceramics / Sanitary ware</option>
          <option value="11">Chemicals / PetroChemical / Plastic / Rubber</option>
          <option value="12">Construction / Engineering / Cement / Metals</option>
          <option value="13">Consumer Electronics / Appliances / Durables</option>
          <option value="14">Courier / Transportation / Freight / Warehousing</option>
          <option value="15">Education / Teaching / Training</option>
          <option value="16">Electricals / Switchgears</option>
          <option value="17">Export / Import</option>
          <option value="18">Facility Management</option>
          <option value="19">Fertilizers / Pesticides</option>
          <option value="20">FMCG / Foods / Beverage</option>
          <option value="21">Food Processing</option>
          <option value="22">Fresher / Trainee / Entry Level</option>
          <option value="25">Gems / Jewellery</option>
          <option value="26">Glass / Glassware</option>
          <option value="27">Other </option>

        </select>

        <label>Salary Range in LKR</label>
        <select name="jobType">
          <option value=1> 0 - 10000 </option>
          <option value=2>10000 - 35000</option>
          <option value=3>35000 - 55000</option>
          <option value=4>55000 - 100000</option>
          <option value=5>100000 - 500000</option>

        </select>
        <hr>
        <h3> <b>Job Location</b></h3>

        <hr>
        <label for="city"><b>City</b></label>
        <select name="city">
          <option value="1">Addalaichenai</option>
          <option value="2">Adippala</option>
          <option value="3">Agalawatta</option>
          <option value="4">Agaliya</option>
          <option value="5">Agarapathana</option>
          <option value="6">Agbopura</option>
          <option value="7">Ahangama</option>
          <option value="8">Ahungalla</option>
          <option value="9">Akaragama</option>
          <option value="10">Eravur</option>


        </select>

        <label for="district"><b>District</b></label>
        <select name="district">

          <option value="1">Ampara</option>
          <option value="2">Anuradhapura</option>
          <option value="3">Badulla</option>
          <option value="4">Batticaloa</option>
          <option value="5">Colombo</option>
          <option value="6">Galle</option>
          <option value="7">Gampaha</option>
          <option value="8">Hambantota</option>
          <option value="9">Jaffna</option>
        </select>

        <label for="province"><b>Province</b></label>
        <select name="province">

          <option value="1">West</option>
          <option value="2">Central</option>
          <option value="3">Eastern</option>
          <option value="4">Northern</option>
          <option value="5">North Central</option>
          <option value="6"option value="1">North West</option>
          <option value="7">Sabragamuwa</option>
          <option value="8">South</option>
          <option value="9">Uva</option>

        </select>






        <hr>
        <h3> <b>Contact Details</b></h3>

        <hr>


        <label for="cName"><b>Contact Name</b></label>
        <input type="text" placeholder="Enter Name of the Person to Contact" name="cName" required>

        <label for="cPosition"><b>Position of the person to contact</b></label>
        <input type="text" placeholder="Enter Position of the person to contact" name="cPosition" required>

        <label for="cPhone"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number to contact" name="cPhone" required>
        <label for="cEmail"><b>Email Address</b></label>
        <input type="text" placeholder="Enter Email Address to contact" name="cPhone" required>


        <p>By creating an account you agree to our <a href="../pages/home.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="reset" class="cancelbtn" >Clear the Form and Reset</button>
          <button type="submit" class="signupbtn">Sign Up</button>


        </div>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
      </form>
    </div>


    <?php include '../structure/footer.php'; ?>

  </body>
  </html>
