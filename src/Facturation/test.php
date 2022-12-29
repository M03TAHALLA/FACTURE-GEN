<?php if (isset($_POST['lignes'])) {
  foreach ($_POST['lignes'] as $ligne) {
    $donnees = $tableau[$ligne];

    // Affichage des données de la ligne
    echo 'Ligne sélectionnée : ' . $donnees;  
}
}
?>