<?php
include("../../db/conn.php"); 
include("../Include/head.php");
?>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Devis...</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<style>
			#PageClient{
				margin-left:1000px;
			}
			#search_text{
				border:solid 2px;
			}
			#search_article{
				border:solid 2px;	
				margin-bottom :20px;
			}
			.selectpicker{
				margin-bottom :20px;
			}
		</style>
	</head>
	<body>

	<?php 	include ("../Include/nav.php");?>
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">Search Devis Disponible </h2><br />
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" /><br>
                        <select class="selectpicker1">
                            <option>NumDevis</option>
                            <option >IdClient</option>
                        </select>
				</div>
			</div>
			<br />
			<div id="resultdevis"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"ConfigDevis.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#resultdevis').html(data);
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