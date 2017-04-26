<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 4/26/2017
 * Time: 12:48 AM
 */

require 'dbConnection.php';

//This is the final json with all of the array information
$qualityReports = array ();


//Get all POI names
$stmt = $dbc->prepare('SELECT * FROM water_quality_reports;');
$stmt->execute();
$response = $stmt->get_result();

if ($response) {
    //Loop through result set
    while ($row = mysqli_fetch_assoc($response)) {
        $tempReport = array();

        $tempReport['reportID'] = $row['reportID'];
        $tempReport['reporter'] = $row['reporter'];
        $tempReport['latitude'] = $row['latitude'];
        $tempReport['longitude'] = $row['longitude'];
        $tempReport['virusPPM'] = $row['virusPPM'];
        $tempReport['contaminantPPM'] = $row['contaminantPPM'];
        $tempReport['waterQuality'] = $row['waterQuality'];

        $qualityReports[] = $tempReport;
    }
}

//Close prepared statement and result set
$stmt -> close();
$response -> close();

//Close connection
$dbc -> close();

echo json_encode($qualityReports);