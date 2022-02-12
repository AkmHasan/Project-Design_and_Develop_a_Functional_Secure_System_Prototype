<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "abc";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
  die ("Failure to connect to the database, please try again later.");
}
