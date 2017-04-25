<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 4/25/2017
 * Time: 12:56 AM
 */
session_start();

require 'dbConnection.php';

$waterType = $_POST["waterType"];
$waterCondition = $_POST["waterCondition"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];

$stmt = $dbc->prepare('INSERT INTO water_source_reports (reporter, dateTime, latitude, longitude, waterCondition, waterType) 
VALUES (?, now(),?,?,?,?)');
//s means string
$stmt->bind_param('sssss', $_SESSION["username"], $latitude, $longitude, $waterCondition, $waterType);

if ($stmt->execute()) {
    echo "Successfully added new report!";
} else {
    echo "Error occurred while adding new report!";
}


//Close prepared statement and result set
$stmt -> close();

//Close connection
$dbc -> close();