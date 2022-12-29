<?php
include("../../db/conn.php"); 
include("../Include/head.php");
?>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Client...</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<style>
			#PageClient{
				margin-left:1000px;
			}
		</style>
	</head>
	<body>

	<?php 	include ("../Include/nav.php");?>
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">Search Clients </h2><br />
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                        <select class="selectpicker">
                            <option value="volvo">ID</option>
                            <option value="saab">Nom</option>
                            <option value="opel">Prenom</option>
                            <option value="audi">Sexe</option>
                        </select>
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />

	</body>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"configClient.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Article...</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2 align="center">Search Articles </h2><br />
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="search_text" id="search_article" placeholder="Search by Customer Details" class="form-control" />
                        <select class="selectpicker">
                            <option value="volvo">IDArticle</option>
                            <option value="saab">NomArticle</option>
                            <option value="opel">Description</option>
                            <option value="audi">Prix</option>
                        </select>
				</div>
			</div>
			<div id="resultArticle"></div>
		</div>
		<div style="clear:both"></div>
		<br>
	</body>
</html>
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"configArticle.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#resultArticle').html(data);
			}
		});
	}
	
	$('#search_article').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
<?php include '../Include/foot.php'; ?>


