<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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

#click {
    background-color: #2684FF;
    padding: 8px;
    border: none;
    border-radius: 8px;
    color: white;
}
.container {
    width: 80%;
    margin: auto;
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
    margin-top: 0px;
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

.champs img {
    color: white;
    background-color: #559cf9;
    padding: 9px;
    cursor: pointer;
    border-radius: 8px;
    /* opacity: 100%; */
}

input {
    outline: none;
}

.champs i {
    color: white;
    background-color: #559cf9;
    padding: 11px;
    cursor: pointer;
    border-radius: 8px;
    /* opacity: 100%; */
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
	padding-top: 90px;
	color: white;
	text-align: center;
}
table {
	text-align: center;
	color: white;
	backdrop-filter: blur(70px);
	width: 80%;
	margin: auto;
	margin-top: 10vh;
	padding-bottom: 20px;
	border-radius: 8px;
    border: 1px solid white;
}

td a i {
	color: white;
}

th {
	padding-top: 10px;
	padding-bottom: 10px;
	padding: 16px;
}

td {
    padding-top: 10px;
	padding-bottom: 10px;
    align-items: center;
    justify-content: center;
	border-top: 1px solid white ;
}

td a {
    color: #2684FF;
    text-decoration: none;
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

.fa-download {
    color: #2684FF;
}

.fa-download:hover {
    color: white;
}

.fa-trash {
    color: red;
}
	</style>
</head>
<body>
<?php 
    
    include'connexion.php';
    session_start();

?>
    <header class="header">
        <div class="container">
            <img src="image/logo_denis.png" alt="">
            <form action="recherche.php" class="champs">
                <input name="field" type="text" placeholder="Rechercher">
                <!-- <i class="fa fa-search" ></i> -->
                <button id="click" name="click" class="fa fa-search"></button>
            </form>

            <nav>
                <ul>
                    <li><a href="acceuil.html">Acceuil</a></li>
                    <li><a  href="">Projets <i class="fa fa-caret-down"></i></a>
                        <!-- <ul class="sous-menu">
                            <li><a href="">Promo 1</a></li>
                            <li><a href="">Promo 2</a></li>
                            <li><a href="">Promo 3</a></li>
                        </ul> -->
                    </li>
                    <li><a href="">Library</a></li>
                    <!-- <li><a href="">Login <i class="fa fa-lock"></i></a></li> -->
                    <li><a href="logout.php">Déconnexion<i class="fa fa"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>


    <h2>Résultats de la recherche :</h2>
    <table>
    <th>nom</th>
		<th>type</th>
		<th>taille</th>
		<th>fichier</th>
        <th>telecharger</th>

        <?php if($_SESSION['role']==='admin') { ?>
		<th>Supprimer</th>
        <?php } ?> 
        
    <tr>
        <?php
        if (isset($_GET['click'])) {

            $field = $_GET['field'];
            
            $sql = "SELECT * FROM files WHERE nom  LIKE '%$field%'";
            
            $result = mysqli_query($connect, $sql);
    
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo'<tr>';
                echo '<td>'.$row['nom'].'</td>';
				echo '<td>'.$row['type'].'</td>';
				echo '<td>'.$row['taille'].'</td>';
				echo '<td>'.$row['fichier'].'</td>';
                ?>
                <?php if($_SESSION['role']==='admin') {?>
				<td id="dd"><a href='files/<?php echo $row['nom'];?>'><i class="fa fa-download"> </i> </a></td>
				<td><a href='files/<?php echo $row['nom'];?>'> <i class="fas fa-trash"></i> </a></td> 
                <?php } ?>
				<?php
            }
        }else {
            echo "Aucun résultat trouvé pour le terme de recherche : " . $field;
        }
    }
    mysqli_close($connect);
        ?>
    </tr>
    </table>
    
</body>
</html>