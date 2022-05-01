<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

$sql="select * from student;";
$result= $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        $lname=$row["lname"];
        $fname=$row["fname"];
        $address=$row["address"];
        $phone=$row["phone"];
        $dob=$row["dob"];
        $isGrad=$row["isGrad"];
        $Ugpa=$row["Ugpa"];
        $Ggpa=$row["Ggpa"];
  }
}else {
  echo "0 results";
}
$conn->close();
?>
<body>
    <h3 class="center"style="margin:40px 20px 0 20px;">Student Information</h3>
<div class="row" style="text-align:center;margin:40px 20px 0 20px;">
<table class="table" >
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Graduate/Undergraduate</th>
            <th scope="col">Undergraduate GPA</th>
            <th scope="col">Graduate GPA</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row"><?php echo $fname?></td>
            <td><?php echo $lname?></td>
            <td><?php echo $dob?></td>
            <td><?php echo $phone?></td>
            <td><?php echo $address?></td>
            <td><?php if($isGrad==0) echo "Undergrad";
                else echo "Grad"; ?></td>
            <td><?php if($Ugpa==NULL) echo "-";
                else echo $Ugpa ?></td>
            <td><?php if($Ggpa==NULL) echo "-";
                else echo $Ggpa?></td>
        </tr>
    </tbody>
</table>
</div>
</body>
</html>