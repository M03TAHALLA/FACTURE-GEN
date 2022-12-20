<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
?>


	  <title>ARTICLES</title>
    <head>
      <style>
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 30px;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>
  </head>
  <body>
<?php 	include ("../Include/nav.php");?>
	  
        <div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">ARTICLES</li>
    </ol>
	<div class="table-responsive">
    <form action="Show_Article_Choisie.php" method="POST">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th><button type="submit" name="Arcticle_Add" class="button button1">Add Liste</button></th>
        <th>IdArticle</th>
        <th>NomArticle</th>
        <th>Description</th>
        <th>Prix</th>
      </tr>
    </thead>
	<tbody>
  <?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM articles ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
      <tr scope="row">
        <td><input type="checkbox" name="Ajouter_id_Article[]" value="<?php echo @$ligne['IdArticle']; ?>"></td>
        <td><?php echo @$ligne['IdArticle'];?></th>
        <td><?php echo @$ligne['NomArticle'];?></td>
        <td><?php echo @$ligne['Description'];?></td>
        <td><?php echo @$ligne['Prix'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
    </form>
		</div>
	</div>
<?php include '../Include/foot.php'; ?>
