<?php

$host="localhost";
$user="root";
$mdp="root";
$bd="file";


$connect= mysqli_connect($host,$user,$mdp,$bd)
or die("erreur de connection ".mysqli_errno($connect));

// echo " connection sucess";
?>