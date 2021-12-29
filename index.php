<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)

$query = "SELECT event.id, event.datetime, 
clubHost.club_name as hostName,
clubGuest.club_name as guestName,
sportCategory.sportCategory_name as sportCategoryName,
venue.venue_name as venueName
FROM `event` 
INNER JOIN club as clubHost
ON clubHost.id = event._clubIdHost  
INNER JOIN club as clubGuest
ON clubGuest.id = event._clubIdGuest
INNER JOIN sportCategory
ON  sportCategory.id = event._sportCategoryId 
INNER JOIN venue
ON venue.id = event._venueId
ORDER BY datetime ASC";

$result = $crud->getData($query);
?>

<html>
<head>	
	<title>Homepage</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>    
    <link rel="stylesheet" href="css/myStyle.css">
</head>

<body>
<a href="add_form.php">Add New Data</a><br/><br/>

<table id="ceo" width='80%'>
    <thead>
	    <tr>
            <th><b>Date and Time</b></td>
            <th><b>Host</b></td>
            <th><b>Guest</b></td>
            <th><b>Sport</b></td>
            <th><b>Venue</b></td>
    	</tr>
    <thead>
    <tbody>
	<?php 
	foreach ($result as $key => $row) {	
		echo "<tr>";
        echo "<td>".date('D., d.m.Y H:i', strtotime($row["datetime"]))."</td>";	
        echo "<td>".$row['hostName']."</td>";
        echo "<td>".$row['guestName']."</td>";
        echo "<td>".$row['sportCategoryName']."</td>";	
        echo "<td>".$row['venueName']."</td>";	
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		

	}
	?>
    </tbody>
	</table>
    <script src="js/sorting.js"></script>
</body>
</html>