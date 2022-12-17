<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>Client Liste</title>
	</head>
	<body>
        <h1>LISTE Client</h1>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM client ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
            
			echo @$ligne['IdClient'] . ' ' . @$ligne['Nom'] . ' ' . @$ligne['Prenom'] . ' ' . @$ligne['Email'] . ' ' . @$ligne['Sexe'] .' ' . @$ligne['Adresse'] . '<br>';
		}
		$mysqli->close();
		?>
	</body> 
</html>