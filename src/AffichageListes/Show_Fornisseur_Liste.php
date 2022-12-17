<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>Fornisseur Liste</title>
	</head>
	<body>
        <h1>LISTE Fornisseur</h1>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fornisseur ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
            
			echo @$ligne['IdFornisseur'] . ' ' . @$ligne['Nom'] . ' ' . @$ligne['Prenom'] . ' ' . @$ligne['Sexe'] . ' ' . @$ligne['Adress'] . '<br>';
		}
		$mysqli->close();
		?>
	</body> 
</html>