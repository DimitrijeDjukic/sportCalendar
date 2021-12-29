<?php
// including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);



//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM event WHERE id=$id");

$query = "SELECT id, club_name FROM `club`";
$clubs = $crud->getData($query);

$query = "SELECT id, sportCategory_name FROM `sportCategory` ORDER BY sportCategory_name, id DESC";
$categories = $crud->getData($query);

$query = "SELECT id, venue_name FROM `venue` ORDER BY venue_name, id DESC";
$venues = $crud->getData($query);


foreach ($result as $res) {
	$hostName = $res['_clubIdHost'];
	$guestName = $res['_clubIdGuest'];
	$sportCategoryName = $res['sportCategoryName'];
    $venueName = $res['venueName'];
    $datetime = $res['datetime'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
    <link rel="stylesheet" href="css/myStyle.css">
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editaction.php">
		<table>
            <tr> 
                <td>Host</td>
                <td>
                <select name="hostName">
                    <?php foreach ($clubs as $key => $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if($hostName == $row['id']) echo 'selected' ?>><?php echo $row['club_name']; ?></option>
                    <?php } ?>
                </select>  
                </td>
            </tr>
            <tr> 
                <td>Guest</td>
                <td>
                <select name="guestName">
                    <?php foreach ($clubs as $key => $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if($guestName == $row['id']) echo 'selected' ?>><?php echo $row['club_name']; ?></option>
                    <?php } ?>
                </select>  
            </td>
            </tr>
            <tr> 
                <td>Sport</td>
                <td>
                <select name="hostName">
                    <?php foreach ($categories as $key => $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if($sportCategoryName == $row['id']) echo 'selected' ?>><?php echo $row['sportCategory_name']; ?></option>
                    <?php } ?>
                </select>      
                </td>
            </tr>
            <tr> 
                <td>Venue</td>
                <td>
                    <select name="venueName">
                        <?php foreach ($venues as $key => $row) { ?>
                            <option value="<?php echo $row['id']; ?>" <?php if($venueName == $row['id']) echo 'selected' ?>><?php echo $row['venue_name']; ?></option>
                        <?php } ?>
                    </select>  
                </td>
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