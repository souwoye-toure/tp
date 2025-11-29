<?php
require_once __DIR__ . "/publication.php";

class PublicationManager {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // CREATE (publier)
    public function create(Publication $pub): bool {
        $sql = "INSERT INTO publication (title, picture, description, datetime, is_published)
                VALUES (:title, :picture, :description, :datetime, :is_published)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ":title"        => $pub->getTitle(),
            ":picture"      => $pub->getPicture(),
            ":description"  => $pub->getDescription(),
            ":datetime"     => $pub->getDatetime(),
            ":is_published" => $pub->getIsPublished(),
        ]);
    }

    // Lister uniquement les posts publiés
    public function getPublished(): array {
        $stmt = $this->pdo->query("SELECT * FROM publication WHERE is_published = 1 ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lister toutes les publications
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM publication ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Modifier le statut (signaler, accepter)
    public function updateStatus(int $id, int $status): bool {
        $sql = "UPDATE publication SET is_published = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ":status" => $status,
            ":id" => $id
        ]);
    }

    // Supprimer une publication
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM publication WHERE id = :id");
        return $stmt->execute([":id" => $id]);
    }
}
