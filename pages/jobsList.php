<?php
session_start();

?>



<?php
$actionVar = 0;
/*
to load the proper buttons,
seeker has Apply button,
admin and only the original owning provider has edit and delete button
guests has login to apply button

*/


include '../structure/header.php';
if(isset($_SESSION["userType"]) && $_SESSION["userType"] === 0){
	//              need to load company welcome page
	include '../structure/menuBar_admin.php';
	$actionVar = 0;
}
elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 1){
	include '../structure/menuBar_seeker.php';
	$actionVar = 1;

}		elseif(isset($_SESSION["userType"]) && $_SESSION["userType"] === 2){

	$actionVar = 2;

	include '../structure/menuBar_Organization.php';
}
else{
	include '../structure/menuBar_home.php';
	$actionVar = 4;

}
echo $actionVar;
?>


<div id="headin2"><strong> <h2>Browse the Jobs </h2></strong></div>
<?php
require_once "../dbConnection.php";


$companyName =$jobIndustry =$city=$district=$province= "";


echo "<table width=\"100%\" border=\"1\" id=\"tab\">";
echo "<tr>";
echo "<th id=\"td1\">Serial No</th><th id=\"td2\">Title</th><th id=\"td3\">Company Name</th>
<th id=\"td4\">Industry</th><th id=\"td5\">Type</th><th id=\"td6\">Salary(LKR)</th><th id=\"td7\">City</th>
<th id=\"td8\">District</th><th id=\"td9\">Province</th><th id=\"td10\">Contact</th><th id=\"td11\">Phone</th><th id=\"td12\">Email</th><th id=\"td13\" colspan=\"3\">Action</th>";
echo "</tr>";



//query1 is to load data from jobPosts database
//query2 : load company name providers table//
//query3: industry
//query4: part time or full time//
//query5: salary Range
//query6: City
//query7: district
//query7: province



$query = "SELECT * FROM job_posts";

$result = mysqli_query($con,$query);


if (!$query) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
}









while ( $row = mysqli_fetch_array($result,MYSQLI_NUM))
{
	$SN = $row[0];
	$jobTitle = $row[1];

	$companyNameID = $row[4];
	$jobIndustryID= $row[2];
	$jobTypeID = $row[3];
	$salaryRangeID = $row[8];
	$cityID = $row[5];
	$districtID = $row[6];
	$ProvinceID = $row[7];

	$contact = $row[9];
	$phone  = $row[10];
	$email = $row[11];


	//query2 : load company name providers table//
	//query3: industry
	//query4: part time or full time//
	//query5: salary Range
	//query6: City
	//query7: district
	//query7: province




//I am loading the proper Company Name from the table correspinding to the userID who is posting htis post
	$query2 = "SELECT providerName FROM job_providers WHERE userID=? ";
	if($result2 = mysqli_prepare($con, $query2)){
		mysqli_stmt_bind_param($result2, "s", $param_userID);
		$param_userID = $companyNameID;

		if(mysqli_stmt_execute($result2)){
			/* store result */
			mysqli_stmt_bind_result($result2, $cName);
			while (mysqli_stmt_fetch($result2)) {
				$companyName = $cName;
			}

		} else{
			echo "[1] Oops! Something went wrong. Please try again later.";
		}
		//	mysqli_stmt_close($result2);

	}




//I am loading the proper Industry Type from the table correspinding to the type ID the poster selected
	$query3 = "SELECT industry_type FROM job_industry_type WHERE industryTypeID=? ";
	if($result3 = mysqli_prepare($con, $query3)){
		mysqli_stmt_bind_param($result3, "s", $param_indID);
		$param_indID = $jobIndustryID;

		if(mysqli_stmt_execute($result3)){
			/* store result */
			mysqli_stmt_bind_result($result3, $iName);
			while (mysqli_stmt_fetch($result3)) {
				$jobIndustry = $iName;
			}

		} else{
			echo "[2] Oops! Something went wrong. Please try again later.";
		}
		//	mysqli_stmt_close($result2);

	}




//here I am setting the type of job in words, which is stired in the databse as 1 and 0
// 1 - Part time jobs//
// 0 - Full Time job//
	if($jobTypeID==1){
		$jobType = "Part Time";
	}
	elseif($jobTypeID==0){
		$jobType = "Full Time";
	}




	//I am loading the proper salary range from the table correspinding to the type ID the poster selected
		$query4 = "SELECT salaryLowerBound,salaryUpperBound FROM salary_range WHERE salaryRangeID=? ";
		if($result4 = mysqli_prepare($con, $query4)){
			mysqli_stmt_bind_param($result4, "s", $param_indID);
			$param_indID = $salaryRangeID;

			if(mysqli_stmt_execute($result4)){
				/* store result */
				mysqli_stmt_bind_result($result4, $salLow,$salUp);
				while (mysqli_stmt_fetch($result4)) {
					$salaryRangelow = $salLow;
					$salaryRangeup =$salUp;
				}

			} else{
				echo "[2] Oops! Something went wrong. Please try again later.";
			}
			//	mysqli_stmt_close($result2);

		}


//I am not going to load city district province seperately, rather I will only load the city, and from that I will choose the deistrict and Province relevant
//Because the form has no limitation over blocking wring district, province selection of a particular cityID



	$query5 = "SELECT cityName,districtID FROM job_city WHERE cityID=? ";
	if($result5 = mysqli_prepare($con, $query5)){
		mysqli_stmt_bind_param($result5, "s", $param_cityID);
		$param_cityID = $cityID;

		if(mysqli_stmt_execute($result5)){
			/* store result */
			mysqli_stmt_bind_result($result5, $cityName,$districtID);
			while (mysqli_stmt_fetch($result5)) {
				$city = $cityName;
				$DistrictID = $districtID;

			}

		} else{
			echo "[1] Oops! Something went wrong. Please try again later.";
		}
		//	mysqli_stmt_close($result2);

	}



	$query6 = "SELECT districtName,provinceID FROM job_districts WHERE districtId=? ";
	if($result6 = mysqli_prepare($con, $query6)){
		mysqli_stmt_bind_param($result6, "s", $param_districtID);
		$param_districtID = $DistrictID;
		if(mysqli_stmt_execute($result6)){
			/* store result */
			mysqli_stmt_bind_result($result6, $districtName,$provinceID);
			while (mysqli_stmt_fetch($result6)) {
				$district = $districtName;
				$ProvinceID = $provinceID;
			}

		} else{
			echo "[1] Oops! Something went wrong. Please try again later.";
		}
		//	mysqli_stmt_close($result2);

	}

	$query7 = "SELECT provinceName FROM job_province WHERE provinceID=? ";
	if($result7 = mysqli_prepare($con, $query7)){
		mysqli_stmt_bind_param($result7, "s", $param_provinceID);
		$param_provinceID = $ProvinceID;
		if(mysqli_stmt_execute($result7)){
			/* store result */
			mysqli_stmt_bind_result($result7, $provinceName);
			while (mysqli_stmt_fetch($result7)) {
				$province = $provinceName;
			}

		} else{
			echo "[1] Oops! Something went wrong. Please try again later.";
		}
		//	mysqli_stmt_close($result2);

	}




if($actionVar==0){
	//he is an admin
	echo "<tr>";
	echo "<td>".$SN."</td>
	<td>".$jobTitle."</td>
	<td>".$companyName."</td>
	<td>".$jobIndustry."</td>
	<td>".$jobType."</td>
	<td>".$salaryRangelow."-".$salaryRangeup."</td>
	<td>".$city."</td>
	<td>".$district."</td>
	<td>".$province."</td>
	<td>".$contact."</td>
	<td>".$phone."</td>
	<td>".$email."</td>
	<td>"."<input type=\"button\" name=\"edit\" value=\"Edit\"/>
	<input type=\"button\" value=\"Delete\" name=\"delete\" >"."</td>";
	echo "</tr>";
} elseif($actionVar==1){
	//he is a seeker
	echo "<tr>";
	echo "<td>".$SN."</td>
	<td>".$jobTitle."</td>
	<td>".$companyName."</td>
	<td>".$jobIndustry."</td>
	<td>".$jobType."</td>
	<td>".$salaryRangelow."-".$salaryRangeup."</td>
	<td>".$city."</td>
	<td>".$district."</td>
	<td>".$province."</td>
	<td>".$contact."</td>
	<td>".$phone."</td>
	<td>".$email."</td>
	<td>"."<input type=\"button\" name=\"apply\" value=\"Apply\"/>"."</td>";
	echo "</tr>";
}elseif($actionVar==2){
	//he is a seeker
	echo "<tr>";
	echo "<td>".$SN."</td>
	<td>".$jobTitle."</td>
	<td>".$companyName."</td>
	<td>".$jobIndustry."</td>
	<td>".$jobType."</td>
	<td>".$salaryRangelow."-".$salaryRangeup."</td>
	<td>".$city."</td>
	<td>".$district."</td>
	<td>".$province."</td>
	<td>".$contact."</td>
	<td>".$phone."</td>
	<td>".$email."</td>
	<td>"."<input type=\"button\" name=\"edit\" value=\"Edit\"/>
	<input type=\"button\" value=\"Delete\" name=\"delete\" >"."</td>";
	echo "</tr>";
}
else{
	//he is a seeker
	echo "<tr>";
	echo "<td>".$SN."</td>
	<td>".$jobTitle."</td>
	<td>".$companyName."</td>
	<td>".$jobIndustry."</td>
	<td>".$jobType."</td>
	<td>".$salaryRangelow."-".$salaryRangeup."</td>
	<td>".$city."</td>
	<td>".$district."</td>
	<td>".$province."</td>
	<td>".$contact."</td>
	<td>".$phone."</td>
	<td>".$email."</td>
	<td>"."<input type=\"button\" name=\"login\" value=\"Login\"/>"."</td>";
	echo "</tr>";
}



}
?>

</table>
<?php include '../structure/footer.php'; ?>
