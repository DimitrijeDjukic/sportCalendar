<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)

$query = "SELECT id, club_name FROM `club` ORDER BY club_name, id DESC";
$clubs = $crud->getData($query);

$query = "SELECT id, sportCategory_name FROM `sportCategory` ORDER BY sportCategory_name, id DESC";
$categories = $crud->getData($query);

$query = "SELECT id, venue_name FROM `venue` ORDER BY venue_name, id DESC";
$venues = $crud->getData($query);
?>
<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="css/myStyle.css">
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%">
            <tr> 
                <td>Host</td>
                <td>
                    <select name="hostName">
                        <?php
                        foreach ($clubs as $key => $row) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['club_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Guest</td>
                <td>
                    <select name="guestName">
                        <?php
                        foreach ($clubs as $key => $row) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['club_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Sport</td>
                <td>
                    <select name="sportCategoryName">
                        <?php
                        foreach ($categories as $key => $row) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['sportCategory_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Venue</td>
                <td>
                    <select name="venueName">
                        <?php
                        foreach ($venues as $key => $row) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['venue_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="datetime" name="datetime" placeholder="2021-27-12 13:30"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>