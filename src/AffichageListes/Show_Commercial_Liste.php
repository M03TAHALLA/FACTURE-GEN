<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
	include ("../Include/nav.php");
	include("../Admin/Check_If_Admin.php");
	?>



<div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">COMMERCIAUX</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th scope="col">IdCommercial</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
		<th scope="col">Role</th>
        <th scope="col">Sexe</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM commercial";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['IdCommercial']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Prenom']?></td>
		<td><?php
		if(@$ligne['Admin'] == true){
			echo "admin";
		}
		else
			echo "user";
		 
		 ?></td>
		<td><?php echo @$ligne['Sexe']?></td>
        <td><?php echo @$ligne['Email']?></td>
		<td><?php echo @$ligne['Password'].'<br>'?></td>



      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
		</div>
</div>
	<!-- </body> 
	</center>
</html> -->
<?php include '../Include/foot.php'; ?>
