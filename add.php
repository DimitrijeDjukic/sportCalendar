<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {	
	$hostName = $_POST['hostName'];
    $guestName = $_POST['guestName'];
    $sportCategoryName = $_POST['sportCategoryName'];
	$venueName = $_POST['venueName'];
    $datetime = $_POST['datetime'];	
		
	$msg = $validation->check_empty($_POST, array('hostName', 'guestName',
    'sportCategoryName', 'venueName', 'datetime'));

	
	// checking empty fields
	if($msg != null) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
			
		//insert data to database	
		$result = $crud->execute("INSERT INTO event(_clubIdHost, _clubIdGuest,_sportCategoryId, _venueId, datetime) 
        VALUES('$hostName', '$guestName', '$sportCategoryName', '$venueName', '$datetime')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>