<?php 
include("../../db/conn.php"); 
include ("../Include/nav.php");
include("../Include/head.php"); 
    if(isset($_POST['Arcticle_Add'])){
        $all_id=$_POST['Ajouter_id_Article'];
        $extract_id=implode(',',$all_id);?>
        <head>
        <title>VOS ARTICLES</title>
        <?php 	include ("../Include/nav.php");?>
      <style>
  .button {
  background-color:Red; /* Green */
  border: none;
  color: Red;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 30px;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid Red;
}

.button1:hover {
  background-color: Red;
  color: white;
}
</style>
  </head>
	 <div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">VOTRE ARTICLES</li>
    </ol>
	<div class="table-responsive">
        <table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>NomArticle</th>
        <th>Description</th>
        <th>Prix</th>
        <th></th>
      </tr>
    </thead>
	<tbody>
  <?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM articles WHERE IdArticle IN($extract_id)";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
      <tr scope="row">
        <td><?php echo @$ligne['NomArticle'];?></td>
        <td><?php echo @$ligne['Description'];?></td>
        <td><?php echo @$ligne['Prix'].'<br>';?></td>
        <td><button type="submit" name="Arcticle_Delete" class="button button1"> DELETE</button></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
        </div>
        </div>
    <?php }
     include '../Include/foot.php';
    ?>