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