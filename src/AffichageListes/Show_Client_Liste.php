<?php 
	include("../../db/conn.php"); 
	include("../Include/head.php"); 
?>

<title>CLIENTS</title>

</head>
<body>
<?php 	include ("../Include/nav.php");
include("../Authentification/Check_if_Logged_In.php");?>

	<div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">CLIENTS</li>
    </ol>
<!-- ADD CLIENT BUTTON  -->
	<?php if($_SESSION['Admin'] == true){?>
    <a class="btn btn-primary " href="../Admin/addClient.php" role="button">Ajouter Article</a>
    <?php }?>

	<div class="table-responsive mt-2">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>IdClient</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Sexe</th>
		<th>Adresse</th>
		<?php if($_SESSION['Admin'] == true){?>
        <th>Action</th>
        <?php } ?>
      </tr>
    </thead>
		<?php
		$requete = "SELECT * FROM client ";
		$resultat = $conn->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['IdClient']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Email']?></td>
        <td><?php echo @$ligne['Sexe']?></td>
		<td><?php echo @$ligne['Adresse'].'<br>';?></td>
		<?php if($_SESSION['Admin'] == true){?>
        <td>
			<?php
			echo 	"<a class='btn btn-primary btn-sm m-1' href='../Admin/ModifyClient.php?id=$ligne[IdClient]'>Modifier</a>";
		
			echo "<a class='btn btn-danger btn-sm' href='../Admin/DeleteClient.php?id=$ligne[IdClient]'>Supprimer</a>";
			?>
		</td>
        <?php }
        ?>
      </tr>
		<?php }
		$conn->close();
		?>
		</tbody>
		</table>
		</div>
	</div>