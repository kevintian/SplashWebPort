<?php

session_start();

//Connects to database and initializes variable $dbc
require 'dbConnection.php';

$username = $_POST["username"];
$password = $_POST["password"];

//check if user exists//
$stmt = $dbc->prepare('SELECT * FROM users WHERE username = ?');
//s means string
$stmt->bind_param('s', $username);
$stmt->execute();
$response = $stmt->get_result();

//If the user exists
if ($response->num_rows != 0) {
    //Get the users hashed password
    $row = mysqli_fetch_assoc($response); //Gets the first (and only) row as an associative array

    $userType = $row["userType"];
    $hashedPass = $row["password"];
    $email = $row["email"];
    if (password_verify($password, $hashedPass)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $userType;
            $_SESSION['email'] = $email;
        $userInfo = array("user_type" => $userType, "username" => $username);
            echo json_encode($userInfo);
    } else {
        echo "Incorrect username and password combination";
    }
} else {
    //We used to throw different error messages but that's not secure so changing this to the same
    echo "Incorrect username and password combination";
}

//Close prepared statement and result set
$stmt->close();
$response->close();

//Close connection
$dbc->close();

?>
