<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 4/25/2017
 * Time: 1:03 AM
 */

require 'dbConnection.php';

//This is the final json with all of the array information
$sourceReports = array ();


//Get all POI names
$stmt = $dbc->prepare('SELECT * FROM water_source_reports;');
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
        $tempReport['waterCondition'] = $row['waterCondition'];
        $tempReport['waterType'] = $row['waterType'];

        $sourceReports[] = $tempReport;
    }
}

//Close prepared statement and result set
$stmt -> close();
$response -> close();

//Close connection
$dbc -> close();

echo json_encode($sourceReports);