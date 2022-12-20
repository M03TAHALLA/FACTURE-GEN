<?php 
include("../../db/conn.php"); 
include ("../Include/nav.php");
include("../Include/head.php"); 
    if(isset($_POST['Arcticle_Add'])){
        $all_id=$_POST['Ajouter_id_Article'];
        $extract_id=implode(',',$all_id);?>
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