<?php

include'connexion.php';


if (isset($_POST['submit'])){

    $login = $_POST['login'];
    $mdp=$_POST['password'];


if(isset($login)&& isset($mdp)){  


    $req="insert into users (login,password) values('$login','$mdp')";

    if(mysqli_query($connect,$req)){
        echo "R_A_S";
        header("location:authentification.html");
    }
    else{
        echo "li nga defar baxoul";
    }
}
}

mysqli_close($connect);

?>