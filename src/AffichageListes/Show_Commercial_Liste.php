<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>Commercial Liste</title>
	</head>
	<body>
        <h1>LISTE Commercial</h1>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM commercial ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
            
			echo @$ligne['IdCommercial'] . ' ' . @$ligne['Nom'] . ' ' . @$ligne['Prenom'] . ' ' . @$ligne['Role'] . ' ' . @$ligne['Sexe'] .' ' . @$ligne['Email'] . '<br>';
		}
		$mysqli->close();
		?>
	</body> 
</html>