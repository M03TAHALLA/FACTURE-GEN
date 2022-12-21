<?php include("../../db/conn.php");
 
	include("../Include/head.php"); 
	
	?>
	  <title>COMMERCANTS</title>
  </head>
  <body>
<?php 	include ("../Include/nav.php");
		 include("../Admin/Check_If_Admin.php");
?>
<div class = "container my-5">

<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">COMMERCIAUX</li>
    </ol>
	<a class="btn btn-primary " href="../Admin/AddUser.php" role="button">Ajouter Commercial</a>
	<div class="table-responsive mt-2">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>IdCommercial</th>
        <th>Nom</th>
        <th>Prenom</th>
		<th>Role</th>
        <th>Sexe</th>
        <th>Email</th>
        <th>Password</th>
		<th>Action</th>
      </tr>
    </thead>
		<?php
		$requete = "SELECT * FROM commercial";
		$resultat = $conn->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['IdCommercial']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Prenom']?></td>
		<td><?php echo @$ligne['Sexe']?></td>
        <td><?php echo @$ligne['Email']?></td>
		<td><?php echo @$ligne['Password']?></td>
		<td><?php 
			if($ligne['Admin']== 1)
				echo "Admin <br>";
			else
				echo "Utilisateur <br>";
		?></td>
		<td>
			<?php
			echo 	"<a class='btn btn-primary btn-sm m-1' href='../Admin/ModifyUser.php?id=$ligne[IdCommercial]'>Modifier</a>";
		
			echo "<a class='btn btn-danger btn-sm' href='../Admin/DeleteUser.php?id=$ligne[IdCommercial]'>Supprimer</a>";
			?>
		</td>
      </tr>
		<?php }
		$conn->close();
		?>
		</tbody>
		</table>
		</div>
</div> 
<?php include '../Include/foot.php'; ?>
