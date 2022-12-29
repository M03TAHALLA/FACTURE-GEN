<?php
include("../Include/head.php");
$connect = mysqli_connect("sql7.freesqldatabase.com", "sql7586075", "lit9GXL9wY", "sql7586075");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM articles 
	WHERE IdArticle LIKE '%".$search."%'
	OR NomArticle LIKE '%".$search."%' 
	OR Description LIKE '%".$search."%'
    OR Prix LIKE '%".$search."%' 
	";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
	<style>
		#Confirmer{
			margin-bottom:10px;
			position:relative;
			left: 450px;
			margin-top: 10px;
		}
		#Confirmer:hover{
			background-color:green;
		}
		  
	</style>
	<form id="form">
	<script src="configa.js"></script>
    <div class="table-responsive">
					<table class="table table-hover">
                    <thead class="table-dark">
						<tr >
							<th>IdArticle</th>
							<th>NomArticle</th>
							<th>Description</th>
							<th>Prix</th>
							<th>Choix</th>
                            <th>Ton Prix </th>
                        </thead>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
        <tbody>
			<tr scope="row">
				<td>'.$row["IdArticle"].'</td>
				<td>'.$row["NomArticle"].'</td>
				<td>'.$row["Description"].'</td>
				<td>'.$row["Prix"].'</td>
				<td><input class="checkbox" type="checkbox" name="check" ></td>
                <td><input type="number" id="price" placeholder="Price"></td>
			</tr>
            </tbody>
			</form>
		';
	}
	$output.='<input id="Confirmer" class="btn btn-primary btn-lg" type="submit" value="Confirmer Vos Choix">';
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
	SELECT * FROM articles ORDER BY IdArticle";
}

?>