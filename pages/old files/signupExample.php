<?php
// Include config file
require_once "../dbConnection.php";

// Define variables and initialize with empty values
$userType = "2";
$userID = $username = $password = $confirm_password = $email= $companyName = $Website = $industryType = $contactNumber =$address = $city = $district = $province = "";
$username_error = $password_error = $confirm_password_error = $email_error = $companyName_error = $industryType_error = $contactNumber_error = $address_error =$city_error =$district_error =$province_error = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Validate username
  if(empty(trim($_POST["uname"]))){
    $username_error = "Please enter a username.";
  }elseif(empty(trim($_POST["email"]))){
    $email_error = "Please enter Email.";
  }elseif(empty(trim($_POST["name"]))){
    $companyName_error = "Please enter companyName.";
  }elseif(empty(trim($_POST['itype']))){
    $industryType_error = "Please enter industryType.";
  }elseif(empty(trim($_POST["ctel"]))){
    $contactNumber_error = "Please enter contactNumber.";
  }elseif(empty(trim($_POST["cadd"]))){
    $address_error = "Please enter address.";
  }  }elseif(empty(trim($_POST["city"]))){
    $city_error = "Please enter city.";
  }elseif(empty(trim($_POST["district"]))){
    $district_error = "Please enter district.";
  }elseif(empty(trim($_POST["province"]))){
    $province_error = "Please enter province.";
  }
  else{
    // Prepare a select statement to check is username already existing
    $sql1 = "SELECT id FROM users WHERE username = ?";

    if($result = mysqli_prepare($con, $sql1)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($result, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["uname"]);

      //reading values
      $email = $_POST["email"];
      $companyNamer = $_POST["name"];
      $industryType = $_POST["itype"];
      $contactNumber = $_POST["ctel"];
      $address = $_POST["address"];
      $city = $_POST["city"];
      $district= $_POST["district"];
      $province= $_POST["province"];

      echo "$email";
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($result)){
        /* store result */
        mysqli_stmt_store_result($result);

        if(mysqli_stmt_num_rows($result) == 1){
          $username_error = "This username is already taken.";
        } else{
          $username = trim($result["uname"]);
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
    // Close statement
    mysqli_stmt_close($result);
  }


  // Validate password
  if(empty(trim($_POST["psw"]))){
    $password_error = "Please enter a password.";
  } elseif(strlen(trim($_POST["psw"])) < 8){
    $password_error = "Password must have atleast 8 characters.";
  } else{
    $password = trim($_POST["psw"]);
  }

  // Validate confirm password
  if(empty(trim($_POST["psw-repeat"]))){
    $confirm_password_error = "Please confirm password.";
  } else{
    $confirm_password = trim($_POST["psw-repeat"]);
    if(empty($password_error) && ($password != $confirm_password)){
      $confirm_password_error = "Password did not match.";
    }
  }

  // Check input errors before inserting in database
  if(empty($username_error) && empty($password_error) && empty($confirm_password_error&& empty($email_error) && empty($companyName_error) && empty($industryType_error) && empty($address_error) && empty($city_error) && empty($district_error) && empty($province_error) )){


    // Prepare an insert statement
    $sql2 = "INSERT INTO users (userType, username, email, password,) VALUES (?,?,?,?)";

    if($result5 = mysqli_prepare($con, $sql2)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($result5, "ssss", $param_userType, $param_username, $param_email, $param_password);

      // Set parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      $param_email = $email;
      $param_userType = "2";
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($result5)){


        //load userID from users database
        $userID = mysqli_insert_id($con);




        mysqli_stmt_close($result);
        ///insert into providers dB


        $sql3 = "INSERT INTO job_providers (userID, providerName, providerIndustryType, providerContactNumber,providerAddress,providerCity,providerDistrict,providerProvince) VALUES (?,?,?,?,?,?,?,?)";

        if($result3 = mysqli_prepare($con, $sql3)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($result3, "ssssssss", $param_userID, $param_providerName, $param_IndustryType, $param_ContactNumber, $param_providerAddress, $param_providerCity, $param_providerDistrict, $param_providerProvince);

          //setting paramters
          $param_userID = $userID;
          $param_providerName = $companyName;
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
        }

        // Close statement
        mysqli_stmt_close($result3);
      } else{
        echo "Something went wrong. Please try again later.";
      }


      // Close statement






      //ToDo:




    }

    // Close connection
    mysqli_close($link);
  }
  ?>


  <!-- ----------------------------------------------------------------------------------------------------------
  ----------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------------
-->




<!DOCTYPE html>
<html>
<head>

  <title>Sign Up as Job Provider</title>
  <link rel="stylesheet" href="../css/style_signupjp.css" />
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="border:1px solid #ccc">

    <div class="container">
      <h1>Sign Up as Job Provider</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>


      <label for="uname"><b>User Name</b></label>
      <input type="text" placeholder="Enter a User Name" name="uname"  value="<?php echo $username; ?>" >



      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Your Email" name="email" value="<?php echo $email; ?>" >

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" value="<?php echo $password; ?>" >

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Your Password" name="psw-repeat" value="" >

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Your Name" name="name" value="<?php echo $companyName; ?>" >

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

      <label for="ctel"><b>Company Contact Number</b></label>
      <input type="Number" placeholder="Enter Your Company Contact Number" name="ctel" value="<?php echo $username; ?>" >

      <label for="cadd"><b>Company Address</b></label>
      <textarea placeholder="Enter Your Company Address" name="cadd" value="<?php echo $username; ?>" > </textarea>

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

      <p>By creating an account you agree to our <a href="../pages/home.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <input type="submit" class="signupbtn" value="Submit">
        <button type="submit" class="signupbtn">Sign Up</button>
        <button type="reset" class="cancelbtn">Reset</button>
      </div>

    </div>
  </form>




  <?php include '../structure/footer.php'; ?>
</body>
</html>
