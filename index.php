<?php
require_once "indexController.php"; // inclut le controller
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