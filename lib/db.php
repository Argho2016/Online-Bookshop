<?php
$serverName="localhost";
$username="root";
$password="";
$databaseName="boikinun";

function executeNonQuery($query){
global $serverName,$username,$password,$databaseName;
$result=false;
$connection=mysqli_connect($serverName,$username,$password,$databaseName) or die(mysqli_connect_error());
if($connection){
    $result=mysqli_query($connection,$query) or die(mysqli_error());
}
mysqli_close($connection);
return $result;
}

function executeQuery($query){
    return executeNonQuery($query);
}
?>
