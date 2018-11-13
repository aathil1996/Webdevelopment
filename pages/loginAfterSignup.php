<?php
// Initialize the session
if(empty($_SESSION)) session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: home.php");
  exit;
}

// Include config file
require_once "../dbConnection.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_error = $password_error = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Check if username is empty
  if(empty(trim($_POST["username"]))){
    $username_error = "Please enter username.";
  } else{
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if(empty(trim($_POST["password"]))){
    $password_error = "Please enter your password.";
  } else{
    $password = trim($_POST["password"]);
  }

  // checking if the details are matching
  if(empty($username_error) && empty($password_error)){
    // Prepare a select statement
    $sql = "SELECT userId, userType, username, password FROM users WHERE username = ?";

    if($stmt = mysqli_prepare($con, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $userId,$userType, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password)){
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["userId"] = $userId;
              $_SESSION["username"] = $username;
              $_SESSION["userType"] = $userType;


              if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 0){
//              need to load admin welcome page
                header("location: adminHome.php");
                exit;
              }
              elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 1){
//              need to load seeker welcome page
                header("location: seekerHome.php");
                exit;
              }
              elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 2){
//              need to load company welcome page
                header("location: companyHome.php");
                exit;
              }
              else{
//
                header("location: home.php");
                exit;
              }



              // Redirect user to welcome page
              header("location: home.php");
            } else{
              // Display an error message if password is not valid
              $password_error = "Wrong Password";
            }
          }
        } else{
          // Display an error message if username doesn't exist
          $username_error = "Wrong Username";
        }
      } else{
        echo "DB error";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>Log In</title>
  <link rel="stylesheet" href="../css/style_login.css" />
</head>


<body>
  <div class="wrapper">
<h1>You have successfully SignedUp!... Welcome to US!... Just Login and blend with us...!</h1>
    <h1>Login Form</h1>
    <p>Please fill in your credentials to login.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <div class="imgcontainer">
        <img src="../images/user.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <div class="form-group <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username/Email"
           name="username" value="<?php echo $username; ?>" required>

          <span class="help-block"><?php echo $username_error; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password"required>
          <span class="help-block"><?php echo $password_error; ?></span>
        </div>

        <div class="form-group">
          <input type="submit" class="btn-primary" value="Log In">
          <input type="submit" class="cancelbtn" value="Cancel">

        </div>


      <div class="container" style="background-color:#f1f1f1">
          <span class="account"> Don't have an account?
                  <a href="sign_up.php">Sign up now</a>
          </span>
      </div>
</form>
    </div>
    <!-- Footer Section -->
    <?php include '../structure/footer.php'; ?>
  </body>
  </html>
