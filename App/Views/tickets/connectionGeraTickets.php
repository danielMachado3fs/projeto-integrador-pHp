<?php

$servername="localhost";
$username="root";
$password="";
$dbname="scf_db";
$conn=new mysqli($servername,$username,$password, $dbname);
if($conn -> connect_error){
    die("connexao falhou ".$conn->connect_error);

}
?>