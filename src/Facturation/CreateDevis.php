<?php
include("../Include/head.php"); 

	if (isset($_POST['search'])) {
		$response = "<ul><li>No data found!</li></ul>";

		$connection = new mysqli('sql7.freesqldatabase.com', 'sql7586075', 'lit9GXL9wY', 'sql7586075');
		$q = $connection->real_escape_string($_POST['q']);

		$sql = $connection->query("SELECT Nom,Prenom FROM client WHERE Nom LIKE '%$q%'");
		if ($sql->num_rows > 0) {
			$response = "<ul class='ul'>";

			while ($data = $sql->fetch_array())
				$response .= "<li class='li'>" . $data['Nom'] .' '. $data['Prenom'] . "</li>";

			$response .= "</ul>";
		}


		exit($response);
	}
?>
<html>
    <head>
       <?php include ("../Include/nav.php");?>

        <style type="text/css">
            .ul {
                float: left;
                list-style: none;
                padding: 0px;
                border: 1px solid black;
                margin-top: 5px;
                width:18%
            }

            input{
                width: 250px;
                margin:50px;
                
            }
            .li{
                cursor: pointer;
                border: 1px solid black;
                padding : 10px;

                
            }
            .li:hover {
                color: white;
                background-color: black;
                cursor: pointer;
            }
            .Contenair{
                position:relative;
            }
        </style>
    </head>
    <body>
        <h3>Serach Clients .....</h3>
        <div class="Contenair">
        <input type="text" placeholder="Search Client..." id="searchBox">
        <div id="response"></div>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'CreateDevis.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType: 'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var client = $(this).text();
                    $("#searchBox").val(client);
                    $("#response").html("");
                });
            });
        </script>
        </div>
    </body>
</html>
