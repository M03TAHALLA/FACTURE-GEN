<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
	
	?>
	  <title>DEVIS</title>
  </head>
  <body>
<?php 	include ("../Include/nav.php");?>
        <div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">DEVISES</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		
		<thead class="table-dark">
      <tr>
        <th>NumDevis</th>
        <th>IdClient</th>
        <th>DateCréation</th>
		<th>DateExpiration</th>
        <th>TotalePrix</th>
      </tr>
    </thead>
			
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fichdevis";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
		
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['NumDevis']?></th>
        <td><?php echo @$ligne['IdClient']?></td>
        <td><?php echo @$ligne['DateCreation']?></td>
		<td><?php echo @$ligne['DateExpiration']?></td>
		<td><?php echo @$ligne['TotalePrix'].'<br>'?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		
		</table>
		</div>
	</div>
<?php include '../Include/foot.php'; ?>
