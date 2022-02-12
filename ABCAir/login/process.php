<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'abc') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$aircraftID = '';
$aircraftFH = '';
$aircraftSM = '';
$aircraftENG = '';
$aircraftENGT = '';

if (isset($_POST['save'])){
    $aircraftID = $_POST['aircraftID'];
    $aircraftFH = $_POST['aircraftFH'];
    $aircraftSM = $_POST['aircraftSM'];
    $aircraftENG = $_POST['aircraftENG'];
    $aircraftENGT = $_POST['aircraftENGT'];

    $mysqli->query("INSERT INTO data (aircraftID, aircraftFH, aircraftSM, aircraftENG, aircraftENGT) VALUES('$aircraftID', '$aircraftFH', '$aircraftSM', '$aircraftENG', '$aircraftENGT')") or
            die($mysqli->error);

    $_SESSION['messaircraftENG'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['messaircraftENG'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if ($result && $row = $result->fetch_array()){

        $aircraftID = $row['aircraftID'];
        $aircraftFH = $row['aircraftFH'];
        $aircraftSM = $row['aircraftSM'];
        $aircraftENG = $row['aircraftENG'];
        $aircraftENGT = $row['aircraftENGT'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $aircraftID = $_POST['aircraftID'];
    $aircraftFH = $_POST['aircraftFH'];
    $aircraftSM = $_POST['aircraftSM'];
    $aircraftENG = $_POST['aircraftENG'];
    $aircraftENGT = $_POST['aircraftENGT'];

    $mysqli->query("UPDATE data SET aircraftID='$aircraftID', aircraftFH='$aircraftFH', aircraftSM='$aircraftSM', aircraftENG='$aircraftENG', aircraftENGT='$aircraftENGT' WHERE id=$id") or
            die($mysqli->error);

    $_SESSION['messaircraftENG'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}
