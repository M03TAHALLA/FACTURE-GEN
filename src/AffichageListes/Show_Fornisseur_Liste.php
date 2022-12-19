<?php include("../../db/conn.php"); 
	include("../Include/head.php");
	?>
	<?php 	include ("../Include/nav.php");?>

	<?php include('Show_Client_Liste.php');?>

	  <title>FOURNISSEURS AND CLIENTS</title>
  </head>
  <body>
	<div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">FORNISSEURS</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
        <th>IdFornisseur</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sexe</th>
        <th>Adress</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fornisseur ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['IdFornisseur']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Prenom']?></td>
        <td><?php echo @$ligne['Sexe']?></td>
        <td><?php echo @$ligne['Adress'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
		</div>
	</div>
<?php include '../Include/foot.php'; ?>
