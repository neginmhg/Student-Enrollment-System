<?php
try {
    // Setting up server ,username, password, database name.
    $servername="ecs-pd-proj-db.ecs.csus.edu";
    $username="CSC174130";
    $password="Csc134_925194197";
    $dbname="CSC174130";
    
    // Connecting mysql
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $semester =$_POST['semester'];
    $stmt = $conn->prepare("SELECT classesInSemester(:semester);");
    $stmt->bindValue(':semester', $semester, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch();
    echo json_encode(array("data"=>$result["0"],"message"=>"Success."));
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>
