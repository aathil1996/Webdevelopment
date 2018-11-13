<?php
// Include config file
require_once "../dbConnection.php";

// Define variables and initialize with empty values
$userID = $username = $password = $confirm_password = $email= $Name = $Website = $industryType = $contactNumber =$address = $city = $district = $province = "";
$username_err = $password_err = $confirm_password_err = $email_err = $companyName_err = $industryType_err = $contactNumber_err = $address_err =$city_err =$district_err =$province_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate username
  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter a username.";
  } else{
    // Prepare a select statement
    $sql = "SELECT userID FROM users WHERE username = ?";

    if($stmt = mysqli_prepare($con, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["username"]);

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        /* store result */
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){
          $username_err = "This username is already taken.";
        } else{
          $username = trim($_POST["username"]);
          $email = trim($_POST["email"]);
          $Name = trim($_POST["name"]);
          $industryType =trim($_POST['itype']);
          $contactNumber = trim($_POST["ctel"]);
          $address = trim($_POST["cadd"]);
          $city =trim($_POST['city']);
          $district =trim($_POST['district']);
          $province =trim($_POST['province']);


        }
      } else{
        echo "[1] Oops! Something went wrong. Please try again later.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Validate password
  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter a password.";
  } elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have atleast 6 characters.";
  } else{
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm password.";
  } else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password)){
      $confirm_password_err = "Password did not match.";
    }
  }

  // Check input errors before inserting in database
  if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

    // Prepare an insert statement
    $sql = "INSERT INTO users (userType,username,email, password) VALUES (?,?,?,?)";

    if($stmt = mysqli_prepare($con, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $param_userType ,$param_username,$param_email,$param_password);

      // Set parameters
      $param_userType ='2';
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      $param_email = $email;
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        echo "WooooooooW!!! WoW! WoW!  You just became one of us";

        $userID = mysqli_insert_id($con);
        // Close statement
        mysqli_stmt_close($stmt);
        //adding value to Providers' Database
        $sql3 = "INSERT INTO job_seekers (userID, seekerName, seekerType, seekerContactNumber, seekerAddress, seekerCity, seekerDistrict, seekerProvince) VALUES (?,?,?,?,?,?,?,?)";

        if($result3 = mysqli_prepare($con, $sql3)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($result3, "ssssssss", $param_userID, $param_providerName, $param_IndustryType, $param_ContactNumber, $param_providerAddress, $param_providerCity, $param_providerDistrict, $param_providerProvince);

          //setting paramters
          $param_userID = $userID;
          $param_providerName = $Name;
          $param_IndustryType= $industryType;
          $param_ContactNumber= $contactNumber;
          $param_providerAddress=$address;
          $param_providerCity=$city;
          $param_providerDistrict=$district;
          $param_providerProvince=$province;

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($result3)){
            // Redirect to login page
            header("location: login.php");
          } else{
            echo "Something went wrong. Please try again later.";
          }





        // Redirect to login page
        header("location: loginAfterSignup.php");
        //echo "[1]coming here";

      } else{
        echo "[2] Something went wrong. Please try again later";
      }
    }






    // Close statement
    mysqli_stmt_close($result3);
  } else{
    echo "Something went wrong. Please try again later.";
  }
}

// Close connection
mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../css/style_signupjp.css" />
</head>


<body>
  <?php include '../structure/header.php'; ?>

  <div class="container">
    <h1>Sign Up as a JOB Seeker</h1>
    <p><b>Please fill this form to create an account.</b></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <label>Username</label>
      <input type="text"  placeholder="Enter a User Name" name="username"  value="<?php echo $username; ?>">
      <span><?php echo $username_err; ?> <br> <br> <br></span>

      <label>Email</label>
      <input type="text"  placeholder="Enter Email" name="email"  value="<?php echo $email; ?>">
      <span><?php echo $email_err; ?> <br> <br> <br></span>


      <label>Password</label>
      <input type="password" placeholder="Enter Password" name="password"  value="<?php echo $password; ?>">
      <span><?php echo $password_err; ?><br> <br> <br></span>

      <label>Confirm Password</label>
      <input type="password" placeholder="Repeat Your Password" name="confirm_password" value="<?php echo $confirm_password; ?>">
      <span ><?php echo $confirm_password_err; ?><br> <br> <br></span>

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Your Name" name="name" required>

      <label for="itype"><b>Your Field of Expertise</b></label>
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


          <label for="ctel"><b>Your Contact Number</b></label>
          <input type="Number" placeholder="Enter Your Company Contact Number" name="ctel">

          <label for="cadd"><b>Your Address</b></label>
          <textarea placeholder="Enter Your Company Address" name="cadd"> </textarea>

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

          <label for="district"><b>Your District</b></label>
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

          <label for="province"><b>Your Province</b></label>
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



      <p>By creating an account you agree to our <a href="../pages/home.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
            <button type="reset" class="cancelbtn" >Clear the Form and Reset</button>
            <button type="submit" class="signupbtn">Sign Up as JOB Seeker</button>


      </div>

      <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
  </div>


  <?php include '../structure/footer.php'; ?>

</body>
</html>
