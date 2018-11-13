<?php
session_start();

?>



<?php

include '../structure/header.php';
	  if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 0){
	  //              need to load company welcome page
    include '../structure/menuBar_admin.php';
	  }
		elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 1){
      include '../structure/menuBar_seeker.php';
		}		elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 2){
      include '../structure/menuBar_Organization.php';
				}
				else{
					include '../structure/menuBar_home.php';
				}

?>


<div id="headin2"><strong> <h2>Browse the Jobs </h2></strong></div>
<?php





    echo "<table width=\"100%\" border=\"0\" id=\"tab\">";
    echo "<tr>";
    echo "<th id=\"td1\">Job Serial No</th><th id=\"td2\">Job Title</th>
              <th id=\"td3\">Email</th><th id=\"td4\">Gender</th><th id=\"td5\">city</th>
              <th id=\"td6\">Course</th><th id=\"td7\">status</th><th id=\"td8\" colspan=\"3\">Action</th>";
    echo "</tr>";








    while ( $row = mysql_fetch_array($query))
    {
        $SN = $row['SN'];
        $actitle = $row['ac_title'];
        $email = $row['email'];
        $gender  = $row['sex'];
        $cite = $row['city'];
        $course = $row['CRS'];
        $status  = $row['status'];

        echo "<tr>";
        echo "<td>".$SN."</td><td>".$actitle."</td><td>".$email."</td>
                  <td>".$gender."</td><td>".$cite."</td><td>".$course."</td><td>".$status."</td>
                  <td>"."<input type=\"button\" name=\"edit\" value=\"Edit\"/>
                  <input type=\"button\" value=\"Delete\" name=\"delete\" >"."</td>";
        echo "</tr>";
    }
?>

</table>
