<?php
include("../Include/head.php");
$connect = mysqli_connect("sql7.freesqldatabase.com", "sql7589420", "4fYqwFelZq", "sql7589420");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM client 
	WHERE idClient LIKE '%".$search."%'
	OR Nom LIKE '%".$search."%' 
	OR Prenom LIKE '%".$search."%' 
	OR Sexe LIKE '%".$search."%' 
	";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{?>
 <form 	action="CreateDevisArticle.php" >
<?php
	$output .= '
	<style>
		#Confirmer{
			margin-bottom:10px;
			position:relative;
			left: 500px;
		}
		#Confirmer:hover{
			background-color:green;
		}
		  
	</style>

	<script src="config.js"></script>
    <div class="table-responsive">
					<table class="table table-hover">
                    <thead class="table-dark">
						<tr >
							<th>IdClient</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Email</th>
							<th>Sexe</th>
							<th>Adresse</th>
                        </thead>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
        <tbody>
			<tr scope="row">
				<td>'.$row["IdClient"].'</td>
				<td>'.$row["Nom"].'</td>
				<td>'.$row["Prenom"].'</td>
				<td>'.$row["Email"].'</td>
				<td>'.$row["Sexe"].'</td>
				<td>'.$row["Adresse"].'</td>
			</tr>
            </tbody>

			';
	}
	echo $output;
}
else
{
	echo '<strong> Data Not Found</strong>';
}
}
else
{
	$query = "
	SELECT * FROM client ORDER BY idClient";
}
?>