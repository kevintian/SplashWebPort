<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 4/24/2017
 * Time: 9:31 PM
 */
session_start();

require 'dbConnection.php';


$email = $_POST["email"];
$username = $_SESSION["username"];

$stmt = $dbc->prepare('UPDATE users SET email = ? WHERE username = ?');
//s means string
$stmt->bind_param('ss', $email, $username);

if($stmt->execute()) {
    echo "Successfully updated user information!";
} else {
    echo "An error occurred while updating user information!";
}


//Close prepared statement and result set
$stmt -> close();

//Close connection
$dbc -> close();

?>