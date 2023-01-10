	<?php 
		include("../../db/conn.php"); 
		include("../Include/head.php"); 
			
	?>
	<title>DEVIS</title>
	</head>
	<body>
	<?php 	
		
		include ("../Include/nav.php");
		include("../Authentification/Check_if_Logged_In.php");

		$requete = "SELECT MAX(NumDevis) as maxId FROM fichdevis";
		$maxId =  $conn->query($requete)->fetch_assoc();
		$nextId = $maxId["maxId"]+1;
		$url = "..\Facturation\createDevis.php?id=$nextId";

	?>

    <div class = "container ">
	<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">DEVIS</li>
    </ol>

	<a class="btn btn-primary " href="<?php echo $url?>" role="button">Creer Devis</a>

	<div class="table-responsive mt-2">
		<table id="table_devis" class="table table-hover  ">
		
		<thead class="table-dark">
      <tr>
        <th>NumDevis</th>
        <th>IdClient</th>
        <th>DateCréation</th>
		<th>DateExpiration</th>
        <th>TotalePrix</th>
		<th>Action</th>

      </tr>
    </thead>
			
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fichdevis";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
		
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['NumDevis']?></td>
        <td><?php echo @$ligne['IdClient']?></td>
        <td><?php echo @$ligne['DateCreation']?></td>
		<td><?php echo @$ligne['DateExpiration']?></td>
		<td><?php echo @$ligne['TotalePrix'].'<br>'?></td>
		<td>
			<?php		
			echo "<a class='btn btn-danger btn-sm m-1' href='../Facturation/DeleteDevis.php?id=$ligne[NumDevis]'>Supprimer</a>";
			echo "<a class='btn btn-secondary text-light btn-sm' href='../AffichageListes/viewDevis.php?id=$ligne[NumDevis]'>Visualiser</a>";

			?>
		</td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		
		</table>
		</div>
	</div>

<?php include '../Include/foot.php'; ?>
