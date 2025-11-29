<?php
session_start();
// Inclure le controller
require_once 'publierController.php';
?>

<h1>Publier une nouvelle publication</h1>

<?php
// Affiche les erreurs ou succès
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red'>$error</p>";
    }
}
if ($success) {
    echo "<p style='color:green'>$success</p>";
}
?>

<!-- Inclusion du formulaire -->
<?php include 'partials/form-publish.php'; ?>
