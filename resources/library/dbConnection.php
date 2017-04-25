<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 4/24/2017
 * Time: 8:35 PM
 */

$DB_USER = 'kevintian';
$DB_PASSWORD = 'password';
$DB_HOST = 'localhost';
$DB_NAME = 'splash';
$dbc = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}