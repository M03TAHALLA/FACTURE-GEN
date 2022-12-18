<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>Commande Liste</title>
	</head>
	<body>
        <h1>LISTE Commandes</h1>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM commandes ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
            
			echo @$ligne['NumCommande'] . ' ' . @$ligne['TotalePrix'] . ' ' . @$ligne['DateCréation'] . '<br>';
		}
		$mysqli->close();
		?>
	</body> 
</html>