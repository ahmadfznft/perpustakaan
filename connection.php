<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fauzan_digitallibrary');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>