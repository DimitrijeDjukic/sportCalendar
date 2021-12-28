<?php
// including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update']))
{	
	$id = $crud->escape_string($_POST['id']);
	
	$hostName = $crud->escape_string($_POST['hostName']);
	$guestName = $crud->escape_string($_POST['guestName']);
	$sportCategoryName = $crud->escape_string($_POST['sportCategoryName']);
    $venueName = $crud->escape_string($_POST['venueName']);
    $datetime = $crud->escape_string($_POST['datetime']);
	
	$msg = $validation->check_empty($_POST, array('hostName', 'guestName', 
    'sportCategoryName', 'venueName', 'datetime'));
	
	// checking empty fields
	if($msg) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		//updating the table
		$result = $crud->execute("UPDATE event 
        SET _clubIdHost='$hostName', _clubIdGuest='$guestName', _sportCategoryId='$sportCategoryName',
        _venueId='$venueName', datetime='$datetime'
        WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>