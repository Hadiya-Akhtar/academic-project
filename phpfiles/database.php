<?php
$dbhostName="localhost";
$dbUser="root";
$dbPassword="";
$dbName="major_project";
$conn=mysqli_connect($dbhostName, $dbUser ,$dbPassword, $dbName);
if(!$conn){
    die("something went wrong");
}
?>