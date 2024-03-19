
<?php
include'connexion.php';


// var_dump($_FILES);

if(!empty($_FILES)){
    $file_name=$_FILES['fichier']['name'];
    $file_type=$_FILES['fichier']['type'];
    $file_size=$_FILES['fichier']['size'];

    $file_extension=strrchr($file_name,".");

    $file_tmp_name=$_FILES['fichier']['tmp_name'];

    $file_dest='files/'.$file_name;

    $extension_autoriser=array('.pdf','.PDF','.txt','.pdf','.png','.jpg');

    if(in_array($file_extension,$extension_autoriser)){
        if(move_uploaded_file($file_tmp_name,$file_dest)){
            $req="insert into files (nom,type,taille,fichier) values('$file_name','$file_type','$file_size','$file_dest')";
        if(mysqli_query($connect,$req)){
            echo"fichier envoyer avec succes";
            header("location:index.php");
        }
        else{
            echo"une erreur est survenue lors de l'envoi du fichier";
        }
        }
    }else{
        echo" seuls les fichiers pdf sont autoriser.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un fichier PDF dans la base de données</title>
</head>
<body>
    <h2>Ajouter un fichier PDF dans la base de données</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="pdf_file">Sélectionner un fichier PDF :</label>
        <input type="file" id="pdf_file" name="fichier">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
