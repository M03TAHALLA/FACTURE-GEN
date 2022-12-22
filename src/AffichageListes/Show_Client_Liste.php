<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
	?>
	<div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">CLIENTS</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>IdClient</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Sexe</th>
		<th>Adresse</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM client ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['IdClient']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Email']?></td>
        <td><?php echo @$ligne['Sexe']?></td>
		<td><?php echo @$ligne['Adresse'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
		</div>
	</div>
	<?php include '../Include/foot.php'; ?>
