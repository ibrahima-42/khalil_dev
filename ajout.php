<?php
// Connexion à la base de données
$connexion = mysqli_connect("localhost", "root", "root", "file");

// Vérification de la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérification si un fichier a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fichier"])) {
    // Récupération des informations sur le fichier
    $nom_fichier = $_FILES["fichier"]["name"];
    $type_fichier = $_FILES["fichier"]["type"];
    $taille_fichier = $_FILES["fichier"]["size"];
    $chemin_fichier_temporaire = $_FILES["fichier"]["tmp_name"];

    // Vérification si le fichier est bien un PDF
    if ($type_fichier == "application/pdf") {
        // Lecture du contenu du fichier
        $contenu_fichier = file_get_contents($chemin_fichier_temporaire);
        
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $nom_fichier = mysqli_real_escape_string($connexion, $nom_fichier);
        $contenu_fichier = mysqli_real_escape_string($connexion, $contenu_fichier);

        // Requête SQL pour insérer les informations dans la base de données
        $sql = "insret into files ( nom, filesize) values ('$nom_fichier','$contenu_fichier')";

        // Exécution de la requête SQL
        if (mysqli_query($connexion, $sql)) {
            echo "Le fichier PDF a été ajouté avec succès dans la base de données.";
        } else {
            echo "Erreur lors de l'ajout du fichier PDF dans la base de données : " . mysqli_error($connexion);
        }
    } else {
        echo "Veuillez sélectionner un fichier PDF.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un fichier PDF dans la base de données</title>
    <style>
.header .container{
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    text-align: center;
    align-items: center;
    /* width: 100% !important; */
    /* z-index: 200; */
    position: relative;
}

.header {
    position: fixed;
    width: 100%;
    backdrop-filter: blur(10px);
    /* background: blur(50px); */
    /* background-color: black; */
    z-index: 300;
}

nav ul {
    display: flex;
    gap: 32px;
    list-style: none;
    text-align: center;
    align-items: center;
    width: 100%;
    margin-bottom: 0px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
}

nav ul li a i {
    color: #2684FF;
    margin-left: 5px;
}

nav ul li a:hover {
color: #2684FF !important;
}

.champs i {
    color: white;
    background-color: #559cf9;
    padding: 11px;
    cursor: pointer;
    border-radius: 8px;
    /* opacity: 100%; */
}

input {
    outline: none;
}

.champs input {
    padding: 7px;
    border-radius: 8px;
    width: 310px;
    border: none;
    padding-left: 16px;
    outline: none;
}

.champs {
    gap: 5px;
    display: flex;
    align-items: center;
}

.champs:hover {
    outline: none;
}

/* .header-white {
    background-color: rgb(235, 230, 230);
} */

.sous-menu {
    backdrop-filter: blur(8px);
    /* background-color: lightcoral; */
    list-style: none;
    display: flex;
    /* flex-direction: column; */
    color: white;
    padding-top: 10px;
    padding-left: 0;
    position: absolute;
}

.sous-menu li a {
    color: white;
}

/* .sous-menu {
    display: none;
} */

		body {
		background: url(../file_upload/image/cv.png) black;
		background-size: cover;
	}
	h2 {
		padding-top: 30vh;
		color: white;
		text-align: center;
	}
		table {
			text-align: center;
			color: white;
			backdrop-filter: blur(70px);
			width: 60%;
			margin: auto;
			margin-top: 10vh;
			padding-bottom: 20px;
			border-radius: 8px;
		}

		td a i {
			color: white;
		}

		th {
			padding-top: 10px;
			padding-bottom: 10px;
		}

		td {
			padding-bottom: 20px;
			border-top: 1px solid white ;
		}
		
		#link {
			text-decoration: none;
			color: white;
			font-weight: 600;
			background-color: #2684FF;
			padding: 16px;
			border-radius: 8px;
			margin-top: 20px;
			/* text-align: center; */
			display: flex;
			justify-content: center;
			align-items: center;
			width: 10%;
			margin-left: 43vw;
		}
        label {
            color: white;
        }

        input{
            color: white;
        }

        form {
            width: 45%;
            margin: auto;
            backdrop-filter: blur(90px);
            padding: 20px;
        }

        button{
            color: white;
            background-color: #2684FF;
            border: none;
            padding: 3px;
            border-radius: 3px;
            cursor: pointer;
        }
	</style>
</head>
<body>
    <h2>Ajouter un fichier PDF dans la base de données</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="pdf_file">Sélectionner un fichier PDF :</label>
        <input type="file" id="pdf_file" name="fichier" accept=".pdf">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
