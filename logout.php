<?php

include'connexion.php';

session_start();
session_unset();
session_destroy();
header("Location:authentification.html");
exit();
?>