<?php
try {
    // Setting up server, username, password, database 
    $servername="ecs-pd-proj-db.ecs.csus.edu";
    $username="CSC174130";
    $password="Csc134_925194197";
    $dbname="CSC174130";

    // Connecting to PDO and mysql
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $newClassName =$_POST['className'];
    $newSectionNum =$_POST['sectionNum'];
    $newSemester =$_POST['semester'];
    $newDay =$_POST['day'];
    $newTime =$_POST['time'];
    $newRoom =$_POST['room'];
    $stmt = $conn->prepare("INSERT INTO class (className, sectionNum, semester, day, time, room) VALUES (:className, :sectionNum, :semester, :day, :time, :room)");

    $stmt->bindValue(':className', $newClassName, PDO::PARAM_STR);
    $stmt->bindValue(':sectionNum', $newSectionNum, PDO::PARAM_INT);
    $stmt->bindValue(':semester', $newSemester, PDO::PARAM_STR);
    $stmt->bindValue(':day', $newDay, PDO::PARAM_STR);
    $stmt->bindValue(':time', $newTime, PDO::PARAM_STR);
    $stmt->bindValue(':room', $newRoom, PDO::PARAM_STR);
    $stmt->execute();

    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo " <script type='text/JavaScript'>
    window.location.href='./index.php';
    </script>";
?>
