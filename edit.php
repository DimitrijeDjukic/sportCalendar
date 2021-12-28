<?php
// including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM event WHERE id=$id");

foreach ($result as $res) {
	$hostName = $res['hostName'];
	$guestName = $res['guestName'];
	$sportCategoryName = $res['sportCategoryName'];
    $venueName = $res['venueName'];
    $datetime = $res['datetime'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editaction.php">
		<table>
        <tr> 
                <td>Host</td>
                <td><input type="text" name="hostName" placeholder="1"></td>
            </tr>
            <tr> 
                <td>Guest</td>
                <td><input type="text" name="guestName" placeholder="2"></td>
            </tr>
            <tr> 
                <td>Sport</td>
                <td><input type="text" name="sportCategoryName" placeholder="1"></td>
            </tr>
            <tr> 
                <td>Venue</td>
                <td><input type="text" name="venueName" placeholder="1"></td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="datetime" name="datetime" placeholder="2021-27-12 13:30"></td>
            </tr>
            <tr> 
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>