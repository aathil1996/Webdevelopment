<!DOCTYPE html>
<html>
    <head>

        <title>Sign Up as Job Provider</title>
        <link rel="stylesheet" href="../css/style_signupjp.css" />
    </head>

    <body>

    <form action="/action_page.php" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up as Job Provider</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="uname"><b>User Name</b></label>
            <input type="text" placeholder="Enter a User Name" name="uname" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Your Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Your Password" name="psw-repeat" required>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Your Name" name="name" required>

            <label for="itype"><b>Industrial Type</b></label>
            <select name="itype">
                <option>Advertising / PR / MR / Event Management</option>
                <option>Accounting / Finance</option>
                <option>Agriculture / Dairy</option>
                <option>Animation / Gaming</option>
                <option>Architecture / Interior Design</option>
                <option>Automobile / Auto Anciliary / Auto Components</option>
                <option>Aviation / Aerospace Firms</option>
                <option>Banking / Financial Services / Broking</option>
                <option>BPO / Call Centre / ITES</option>
                <option>Brewery / Distillery</option>
                <option>Ceramics / Sanitary ware</option>
                <option>Chemicals / PetroChemical / Plastic / Rubber</option>
                <option>Construction / Engineering / Cement / Metals</option>
                <option>Consumer Electronics / Appliances / Durables</option>
                <option>Courier / Transportation / Freight / Warehousing</option>
                <option>Education / Teaching / Training</option>
                <option>Electricals / Switchgears</option>
                <option>Export / Import</option>
                <option>Facility Management</option>
                <option>Fertilizers / Pesticides</option>
                <option>FMCG / Foods / Beverage</option>
                <option>Food Processing</option>
                <option>Fresher / Trainee / Entry Level</option>
                <option>Gems / Jewellery</option>
                <option>Glass / Glassware</option>
                <option>Other </option>

            </select>

            <label for="ctel"><b>Company Contact Number</b></label>
            <input type="Number" placeholder="Enter Your Company Contact Number" name="ctel" required>

            <label for="cadd"><b>Company Address</b></label>
            <textarea placeholder="Enter Your Company Address" name="cadd" required> </textarea>

            <label for="city"><b>City</b></label>
            <select name="city">

                    <option>Addalaichenai</option>
                    <option>Adippala</option>
                    <option>Agalawatta</option>
                    <option>Agaliya</option>
                    <option>Eravur</option>

            </select>

            <label for="district"><b>District</b></label>
            <select name="district">

                    <option>Ampara</option>
                    <option>Anuradhapura</option>
                    <option>Badulla</option>
                    <option>Batticaloa</option>
                    <option>Colombo</option>
                    <option>districtName</option>
                    <option>Galle</option>
                    <option>Gampaha</option>
                    <option>Hambantota</option>
                    <option>Jaffna</option>
                    <option>Kalutara</option>
                    <option>Kandy</option>
                    <option>Kegalle</option>
                    <option>Kilinochi</option>
                    <option>Kurunegala</option>
                    <option>Mannar</option>
                    <option>Matale</option>
                    <option>Matara</option>
                    <option>Monaragala</option>
                    <option>Mullaitivu</option>
                    <option>Nuwaraeliya</option>
                    <option>Polonnaruwa</option>
                    <option>Puttalam</option>
                    <option>Ratnapura</option>
                    <option>Trincomalee</option>
                    <option>Vavuniya</option>
            </select>

            <label for="province"><b>Province</b></label>
            <select name="province">

                    <option>West</option>
                    <option>Central</option>
                    <option>Eastern</option>
                    <option>Northern</option>
                    <option>North Central</option>
                    <option>North West</option>
                    <option>Sabragamuwa</option>
                    <option>South</option>
                    <option>Uva</option>

             </select>



            <p>By creating an account you agree to our <a href="../pages/home.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
              <button type="submit" class="signupbtn">Sign Up</button>
              <button type="submit" class="cancelbtn" formaction="../pages/home.php">Cancel</button>
            </div>

        </div>
</form>




  <?php include '../structure/footer.php'; ?>
    </body>
    </html>
