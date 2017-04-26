<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 4/26/2017
 * Time: 1:11 AM
 */
session_start();

require 'dbConnection.php';

$waterQuality = $_POST["waterQuality"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$virusPPM = $_POST["virusPPM"];
$contaminantPPM = $_POST["contaminantPPM"];

$stmt = $dbc->prepare('INSERT into water_quality_reports (reporter, virusPPM, contaminantPPM, dateTime, latitude, longitude, waterQuality) VALUES (?, ?, ?, now(), ?, ?, ?);');
//s means string
$stmt->bind_param('siisss', $_SESSION["username"], $virusPPM, $contaminantPPM, $latitude, $longitude, $waterQuality);

if ($stmt->execute()) {
    echo "Successfully added new report!";
} else {
    echo "Error occurred while adding new report!";
}


//Close prepared statement and result set
$stmt -> close();

//Close connection
$dbc -> close();