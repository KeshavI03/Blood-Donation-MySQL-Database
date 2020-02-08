
<!DOCTYPE html>
<html>
<head>
	<title>Testing php</title>
	<link rel="stylesheet" href="style.css">
	<script src="displayTotals.js"></script>
</head>
<body>
	<h1>This is a test</h1>

	<div>
		<h4>1:  1600 Pennsylvania Avenue, Washington DC</h4>
		<h4>2:  11 Wall Street New York, NY</h4>
		<h4>3:  350 Fifth Avenue New York, NY 10118</h4>
		<h4>4:  221 B Baker St, London, England</h4>
		<h4>5:  Tour Eiffel Champ de Mars, Paris</h4>
	</div>

	 <form method="post"> 
        Your Blood Group:
        <br>
        <input type="text" name="bloodGroup" value=""/>
        <br>
        Your Rh Factor:
        <br>
        <input type="text" name="rhFactor" value=""/>
        <br>
        <input type="submit" name="button1" class="button" value="Get Information"/>
    </form> 

    <button onclick="showTotals()">Get Totals</button>

    <?php 
		include_once("displayInfo.php");	
	?>

</body>
</html>