<?php
include("../Include/head.php");
$connect = mysqli_connect("sql7.freesqldatabase.com", "sql7589420", "4fYqwFelZq", "sql7589420");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM fichdevis 
	WHERE NumDevis LIKE '%".$search."%'
    OR IdClient LIKE '%".$search."%'
	OR TotalePrix LIKE '%".$search."%' 
	";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{?>
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
							<th>NumDevis</th>
							<th>idClient</th>
							<th>DateCreation</th>
							<th>DateExpiration</th>
							<th>TotalePrix</th>
                        </thead>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
        <tbody>
			<tr scope="row">
				<td>'.$row["NumDevis"].'</td>
				<td>'.$row["IdClient"].'</td>
				<td>'.$row["DateCreation"].'</td>
				<td>'.$row["DateExpiration"].'</td>
				<td>'.$row["TotalePrix"].'</td>
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
	SELECT * FROM fichdevis ORDER BY NumDevis";
}
?>