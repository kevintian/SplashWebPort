<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['user_type']) || !isset($_SESSION['email'])) {
    header("location: index.html");
    exit();
}
?>