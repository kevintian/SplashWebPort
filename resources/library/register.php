<?php
require 'dbConnection.php';

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$type = $_POST["type"];

//check if user exists//
$stmt = $dbc->prepare('SELECT * FROM users WHERE username = ?');
//s means string
$stmt->bind_param('s', $username);

$stmt->execute();
$response = $stmt->get_result();

//check length of response to see if there's a match
if ($response->num_rows == 0) {
    //Hash the password
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    $user_created = true;

    //Start transaction -> this allows us to rollback if one of the queries fails instead of leaving behind data
    $dbc -> begin_transaction();

    //Insert user into database
    $stmt = $dbc -> prepare('INSERT INTO users(email, username, password, userType) VALUES(?,?,?,?)');
    $stmt->bind_param('ssss', $email, $username, $hashed_pass, $type);

    if (!$stmt->execute()) {
        $user_created = false;
    }

    //Checks if statement passed -> if not, rollback all changes and throw error message
    if ($user_created) {
        $dbc -> commit();
        $result = array("success" => $user_created, "message" => "User created successfully!");
        echo json_encode($result);
    } else {
        $dbc -> rollback();
        $result = array("success" => $user_created, "message" => "An error occurred during account creation. If this issue persists, please contact the administrator.");
        echo json_encode($result);
    }

} else {
    $result = array("success" => false, "message" => "User already exists!");
    echo json_encode($result);
}

//Close prepared statement and result set
$stmt -> close();
$response -> close();

//Close connection
$dbc -> close();

?>