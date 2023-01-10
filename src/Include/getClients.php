<?php 
    $clients = array();
    $requete = "SELECT Nom FROM client ";
    $resultat = $conn->query($requete);
    while ($ligne = $resultat->fetch_assoc()) {

        $clients[] = $ligne['Nom'];

         }
         $clients_json = json_encode($clients);

?>