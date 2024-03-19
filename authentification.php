<?php

include'connexion.php';
session_start();

if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $mdp=$_POST['password'];

    if(isset($login) && isset($mdp)){

        $req= "select id, role from users where login='$login' and  password='$mdp'";

        $result= mysqli_query($connect,$req);

        if(mysqli_num_rows($result)== 1){
            while($row2=mysqli_fetch_assoc($result)){
            $_SESSION['login']=$login;
            $_SESSION['role']=$row2['role'];
            header("Location:acceuil.html");
            }
        }else{
            echo "login or password incorrect";
        }
    }
}
mysqli_close($connect);
?>