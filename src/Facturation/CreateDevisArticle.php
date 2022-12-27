<?php
include("../../db/conn.php"); 
include("../Include/head.php");
?>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Article...</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
	<?php 	include ("../Include/nav.php");?>
		<div class="container">
			<br />
			<br />
			<br />
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
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
        
	</body>
</html>
<?php include '../Include/foot.php'; ?>

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
				$('#result').html(data);
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