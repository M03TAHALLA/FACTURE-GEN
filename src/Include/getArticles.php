<?php 
    $articles = array();
    $requete = "SELECT NomArticle FROM articles ";
    $resultat = $conn->query($requete);
    while ($ligne = $resultat->fetch_assoc()) {

        $articles[] = $ligne['NomArticle'];

         }
         $articles_json = json_encode($articles);

?>