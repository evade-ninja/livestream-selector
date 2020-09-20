<?php

require_once "secrets.php";

//Get all the wards
//SELECT abbreviation, wardname, starttime, broadcast_id FROM wards LEFT JOIN broadcasts on wards.id = broadcasts.id;

$dbcon = mysqli_connect($hostname, $username, $password);

if(!$dbcon){
    die("Can't connect to database!!! (yeah thats bad) " + mysqli_connect_error());
}

echo "Connected!";

?>