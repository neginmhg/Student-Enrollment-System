<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
$sql="select * from class_professor_view";
$result= $conn->query($sql);
$row; ?>
<body>
<center>
<h3 class="center" style="margin:30px 0 40px 0;">Classses you are enrolled in</h3>
<!--SHOW CLASSES -->
<div class="container">
  <div style="width:50vw;" class="row">
    <div class="col-sm">
        <!-- M/W/F CLASSES -->
       <a href="./evenClass.php"> <input style="width:200px;" type="submit" name="submit" id="even" value="M/W/F Classes" class="btn btn-secondary"/>
        </a>
    </div>
    <div class="col-sm">
        <!-- T/TH CLASSES -->
        <a href="oddClass.php"><input type="submit" href="./oddClass.php" style="width:200px;" name="submit" id="odd" value="T/TH Classes" class="btn btn-secondary"/>
        </a>
    </div>
  </div>
  <div class="row" style="width:50vw;padding-top:50px;border: 1px solid black;">
        <!-- Number of classes -->
        <div class="col-sm">
        <label for="sem">Calculate number of classes in:</label>
        </div>
        <div class="col-sm">
        <select name="sem" id="sem">
            <option value="fall">Fall</option>
            <option value="spring">Spring</option>
            <option value="summer">Summer</option>
        </select>
       </div>
       <div class="col-sm">
        <button class="btn btn-primary" onclick="classesInSemester()">Calculate</button>
        </div>
        <br><h5 style="width:50vw;" id="result"></h5>
        </div>
        <br><h5 style="width:50vw;" id="result"></h5>
        </div>
</div>
<!-- ALL CLASSES -->
<div class="row" style="text-align:center;margin:0 20px;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Class Name</th>
                <th scope="col">Section Number</th>
                <th scope="col">Semester</th>
                <th scope="col">Day</th>
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
                <td><?php echo $row["day"]?></td>
                <td><?php echo $row["time"]?></td>
                <td><?php echo $row["room"]?></td>
                <td> <?php echo $row["fname"]." ".$row["lname"] ?></td>
            </tr>
        <?php $i++; } }
        else {echo "0 results";}$conn->close();?>
        </tbody>
    </table>
</div>
<br><br>
<div class="row"  id="class-form">
  <form class="enroll_form" style="width:50vw; margin-left:25vw;" action="addClass.php" method="POST">
        <h3 class="center">Enroll a class</h3>
        <div >
            <label for="name">Class Name: </label><br>
            <input required placeholder="Writing" type="text" name="className"  id="name" >
        </div>
        <div >
            <label for="section">Section Number : </label><br>
            <input required placeholder="1002003" type="text" name="sectionNum"  id="section" >
        </div>
        <div >
            <label for="sem">Semester : </label><br>
            <input required placeholder="Fall or Spring or Summer" type="text" name="semester"  id="sem" >
        </div>
    <div >
        <label for="day">Day : </label><br>
        <input required placeholder="M/W/F or T/TH" type="text" name="day"  id="day" >
    </div>
    <div >
        <label for="time">Time : </label><br>
        <input required placeholder="08:00:00" type="text" name="time"  id="time" >
    </div>
    <div >
        <label for="room">Room : </label><br>
        <input required placeholder="room123" type="text" name="room"  id="room" >
    </div>
        <br>
        <input type="submit" name="submit" id="addClass" value="Enroll" class="btn btn-primary"/>

    </form>
  </div>
<!-- End Show Classes -->
<script src="../js/class.js"></script>
</body>
</html>