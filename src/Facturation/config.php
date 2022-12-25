<?php
include("../../db/conn.php"); 
include("../Include/head.php");
$connect = mysqli_connect("sql7.freesqldatabase.com", "sql7586075", "lit9GXL9wY", "sql7586075");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM client 
	WHERE idClient LIKE '%".$search."%'
	OR Nom LIKE '%".$search."%' 
	OR Prenom LIKE '%".$search."%' 
	OR Email LIKE '%".$search."%' 
	OR Sexe LIKE '%".$search."%' 
	OR Adresse LIKE '%".$search."%'
	";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
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
                            <th><th>
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
                <td>
                <a class="btn btn-primary btn-sm m-1" >Ajouter</a>
                            </td>
			</tr>
            </tbody>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
}
else
{
	$query = "
	SELECT * FROM client ORDER BY idClient";
}

?>