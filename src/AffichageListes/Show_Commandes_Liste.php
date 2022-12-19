
<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
	include ("../Include/nav.php");
	
	?>
	<div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">COMMANDES</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>NumCommande</th>
        <th>TotalePrix</th>
        <th>DateCréation</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM commandes";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['NumCommande']?></th>
        <td><?php echo @$ligne['TotalePrix']?></td>
        <td><?php echo @$ligne['DateCreation'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
		</div>
	</div> 
<?php include '../Include/foot.php'; ?>
