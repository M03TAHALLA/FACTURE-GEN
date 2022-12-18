<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>Article Liste</title>
	</head>
	<body>
        <h1>LISTE Articles</h1>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM articles ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
            
			echo @$ligne['IdArticle'] . ' ' . @$ligne['NomArticle'] . ' ' . @$ligne['Description'] . ' ' . @$ligne['Prix'] . '<br>';
		}
		$mysqli->close();
		?>
	</body> 
</html>