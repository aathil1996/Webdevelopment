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

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Your Name" name="name" required>

             <label for="uname"><b>User Name</b></label>
            <input type="text" placeholder="Enter a User Name" name="uname" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Your Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Your Password" name="psw-repeat" required>

            <label for="gender"><b>Gender</b></label>
            <select name="gender">
                <option> Male</option>
                <option> Female</option>
            </select>

            <label for="mobile"><b>Mobile Number</b></label>
            <input type="Number" placeholder="Enter Your Mobile Number" name="mobile" required>

            <label for="cname"><b>Company Name</b></label>
            <input type="text" placeholder="Enter Your Company Name" name="cname" required>

            <label for="curl"><b>Company Website</b></label>
            <input type="text" placeholder="Enter Your Company Website" name="curl" required>

            <label for="itype"><b>Industrial Type</b></label>
            <select name="itype">
                <option> Accounts / Finance / Tax / CS / Audit </option>
                <option> Agent </option>
                <option> Analytics & Business Intelligence </option>
                <option> Architecture / Interior Design </option>
                <option> Banking / Insurance </option>
                <option> Content / Journalism </option>
                <option> Corporate Planning / Consulting </option>
                <option> Engineering Design / R&D </option>
                <option> Export / Import / Merchandising </option>
                <option> Fashion / Garments / Merchandising </option>
                <option> Guards / Security Services </option>
                <option> Hotels / Restaurants </option>
                <option> HR / Administration / IR </option>
                <option> IT Software - Application Programming / Maintenance </option>
                <option> IT Software - Client Server </option>
                <option> IT Software - Mainframe </option>
                <option> IT Software - Middleware </option>
                <option> IT Software - Mobile </option>
                <option> IT Software - Other</option>
                <option> IT Software - System Programming </option>
                <option> IT Software - Telecom Software</option>
                <option> IT Software - DBA / Datawarehousing </option>
                <option> IT Software - E-Commerce / Internet Technologies </option>
                <option> IT Software - Embedded /EDA /VLSI /ASIC /Chip Des. </option>
                <option> IT Software - ERP / CRM </option>
                <option> IT Software - Network Administration / Security </option>
                <option> IT Software - QA & Testing</option>
                <option> IT Software - Systems / EDP / MIS </option>
                <option> IT Hardware / Telecom / Technical Staff / Support </option>
                 <option> ITES / BPO / KPO / Customer Service / Operations </option>
                <option> Legal </option>
                 <option> Marketing / Advertising / MR / PR </option>
                <option> Packaging </option>
                 <option> Pharma / Biotech / Healthcare / Medical / R&D </option>
                <option> Production / Maintenance / Quality </option>
                 <option> Purchase / Logistics / Supply Chain </option>
                <option> Sales / BD </option>
                 <option> Secretary / Front Office / Data Entry </option>
                <option> Self Employed / Consultants </option>
                <option> Shipping </option>
                 <option> Site Engineering / Project Management </option>
                <option> Teaching / Education </option>
                <option> Ticketing / Travel / Airlines </option>
                 <option> Top Management </option>
                <option> TV / Films / Production </option>
                <option> Web / Graphic Design / Visualiser </option>
                 <option> Other </option>
            </select>
            
            <label for="ctel"><b>Company Contact Number</b></label>
            <input type="Number" placeholder="Enter Your Company Contact Number" name="ctel" required>

             <label for="cadd"><b>Company Address</b></label>
            <textarea placeholder="Enter Your Company Address" name="cadd" required> </textarea>

            
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
