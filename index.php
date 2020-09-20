<?php

require_once "secrets.php";

//Get all the wards
//SELECT abbreviation, wardname, starttime, broadcast_id FROM wards LEFT JOIN broadcasts on wards.id = broadcasts.id;

$dbcon = mysqli_connect($hostname, $username, $password, $database);

if(!$dbcon){
    die("Can't connect to database!!! (yeah thats bad) " + mysqli_connect_error());
}

echo "Connected!<br>";

if($_GET['w']){
    print "Get: " . $_GET['w'] . "<br>";
    $sql = "SELECT wardname, starttime, broadcast_id FROM wards LEFT JOIN broadcasts on wards.id = broadcasts.id WHERE wards.abbreviation like '" . mysqli_real_escape_string($dbcon, $_GET['w']) . "';";
    print("SQL: " . $sql . "<br>");
    $result = mysqli_query($dbcon, $sql);

    print ("NumRows:" . mysqli_num_rows($result) . "<br>");


    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            //echo $row["wardname"] . "<br>";
            print_r($row);
        }
    }else{
        print "No results :/";
    }

}
else{
    $sql = "SELECT abbreviation, wardname, starttime, broadcast_id FROM wards LEFT JOIN broadcasts on wards.id = broadcasts.id;";
    $result = mysqli_query($dbcon, $sql);

    print ("NumRows:" . mysqli_num_rows($result));


    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            //echo $row["wardname"] . "<br>";
            print_r($row);
        }
    }else{
        print "No results :/";
    }
}

?>