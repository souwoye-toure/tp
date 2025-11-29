<?php
require_once "database.php";

// Paramètres de connexion à la base de données

$host = "localhost"; 
$dbname = "publication";
$user = "root";
$password="";

// gérer les erreurs de connexion ou d'exécution SQL

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, picture, description, datetime
            FROM publication
            WHERE is_published = 1
            ORDER BY datetime DESC";

    $stmt = $db->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet plateforme Instagram</title>
</head>
<body>
    <h1>Fil d’actualité</h1>

    <?php if(!empty($posts)) :?>

        <pre><?php print_r($posts); ?></pre>

        <?php foreach($posts as $post):?>

            <div class="post">
                <p><strong>ID: <?= htmlspecialchars($post['id']) ?></strong></p>

                <img src="uploads/<?= htmlspecialchars($post['picture']) ?>" alt="post image">

                <p><?= nl2br(htmlspecialchars($post['description'])) ?></p>

                <small><?= htmlspecialchars($post['datetime']) ?></small>

            </div>
        <?php endforeach; ?>
    <?php else :?>
        <p>Aucune publication pour le moment</p>
    <?php endif ?>
</body>
</html>