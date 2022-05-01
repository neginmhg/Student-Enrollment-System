<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even Classes</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="topnav">
        <a class="active" href="../index.php">Student Center</a>
        <a href="../profile/index.php">Profile</a>
        <a href="../class/index.php">Classes</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<?php
require_once("../connection.php");
$sql="select * from even_day_classes;";
$result= $conn->query($sql);
$row; ?>
<body>
<center>

<!--SHOW CLASSES -->

<a href="./index.php"><input style="width:200px;" type="submit" name="submit" id="all" value="All Classes" class="btn btn-secondary"/>
</a>
<!-- ALL CLASSES -->
<h3 class="center" style="margin:50px 0;">Your Even Day Classses</h3>
<div class="row" style="text-align:center;margin:0 20px;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Class Name</th>
                <th scope="col">Section Number</th>
                <th scope="col">Semester</th>
                <th>Time</th>
                <th>Room</th>
                <th>Professor Name</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if ($result->num_rows > 0) {
        // output data of each row
        $i=0; while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td scope="row"><?php echo $row["className"]?> </td>
                <td><?php echo $row["sectionNum"]?> </td>
                <td><?php echo $row["semester"]?></td>
                <td><?php echo $row["time"]?></td>
                <td><?php echo $row["room"]?></td>
                <td><?php echo $row["fname"]." ".$row["$lname"] ?></td>
            </tr>
        <?php $i++; } }
        else {echo "0 results";}$conn->close();?>
        </tbody>
    </table>
</div>

<!-- End Show Classes -->
</body>
</html>
