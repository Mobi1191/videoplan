<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/5/2018
 * Time: 1:34 PM
 */

$servername = "localhost";
$username = "root";
$password = "";

// $servername = "db716847372.db.1and1.com";
// $username = "dbo716847372";
// $password = "3030Million";

$dbname = "db716847372";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}