<?php
	$loc = [0,0,0,0,0];

	if(array_key_exists('button1', $_POST)) { 
    	postData();
        postTotals();
    } 

	function postData(){
		include_once("include\dbc.inc.php");
		global $loc;
		$sql = "SELECT * FROM donor";
		$result = mysqli_query($db, $sql);	
		$resultCheck = mysqli_num_rows($result);

		$ptBloodGroup = $_POST['bloodGroup'];
		$ptRhFactor = $_POST['rhFactor'];

		echo "<table><tr><th>Donor ID</th><th>First Name</th><th>Last Name</th><th>Donor Age</th><th>Blood Type</th><th>Sex</th><th>Blood Age in Days</th><th>mL Donated</th><th>Location Number</th></tr>";
		if($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				if(isCompatible($ptBloodGroup, $ptRhFactor, $row['blood_type'], $row['rh_factor']) || $ptBloodGroup == '' || $ptRhFactor == ''){
					$loc[intval($row['location_num'])-1] += $row['ml_donated'];
					echo "<tr><td>"  . $row['donor_id'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['donor_age'] . "</td><td>" . $row['blood_type']  . $row['rh_factor'] .  "</td><td>" . $row['sex'] .  "</td><td>" . $row['blood_day_age'] .  "</td><td>" . $row['ml_donated'] . "</td><td>" . $row['location_num']  . "</td></tr>";
				}
			}
			echo "</table>";
		}
	}

	function postTotals(){
		global $loc;
	    echo "<br><div id=\"total_outputs\"><table><tr><th></th><th>Location 1</th><th>Location 2</th><th>Location 3</th><th>Location 4</th><th>Location 5</th></tr>";
		echo "<tr><td>mL Donated</td><td>" . $loc[0] . "</td><td>" . $loc[1] . "</td><td>". $loc[2] . "</td><td>". $loc[3] . "</td><td>". $loc[4] . "</td></tr></table></div>";
	}

	function isCompatible($ptBG, $ptRH, $dBG, $dRH){
		$isCompat = true;
		if($ptRH == '-' && $dRH == '+') $isCompat = false;
		if($ptBG != $dBG)
			if($dBG != 'O')
				if($ptBG != 'AB') 
					$isCompat = false; 
		return $isCompat;
	}

?>