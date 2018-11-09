
<!DOCTYPE html>
<html>

  <head>

      <title>Sign Up as Job as Seeker</title>
      <link rel="stylesheet" href="" />
      <link rel="stylesheet" href="../css/style_footer.css">

  </head>

  <body>

        <div id="name">
        Name:
        </div>
        <input type="text" name="user_name" placeholder="Your Name" required />


        <div id="email">
       	Email:
        </div>
        <input type="email" name="email" placeholder="Your Email Address" required />

        <div id="telephone">
       	Contact Number:
        </div>
        <input type="Number" name="telephone" placeholder="Your Contact Number" required />

         <div id="password">
       	Password:
        </div>
        <input type="Password" name="password" placeholder="Enter Your Password" required />

        <div id="password2">
       	Confirm YourPassword:
        </div>
        <input type="Password" name="password2" placeholder="Re-enter Your Password" required />

        <div class = "Image">
            Slect Your Photo: <input type="file" name="image" required/>
         </div>

     	<hr />

        <form >
          <input type="submit" value="Sign Up"/>
        </form>

        </div>
      	<br />
            <label>Do You have account? <a href="login.php">Log In</a></label>
      </form>

    </div>


  <?php include '../structure/footer.php'; ?>
</body>
</html>
