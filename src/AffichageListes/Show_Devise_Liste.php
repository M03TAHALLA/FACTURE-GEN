<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>Devise Liste</title>
	</head>
	<body>
        <h1>FICHE DEVISES</h1>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fichdevis ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
            
			echo @$ligne['NumDevis'] . ' ' . @$ligne['IdClient'] . ' ' . @$ligne['DateCréation'] . ' ' . @$ligne['DateExpiration'] . ' ' . @$ligne['TotalePrix'] . '<br>';
		}
		$mysqli->close();
		?>
	</body> 
</html>