<?php

class Publication {

    private int $id;
    private string $title;
    private string $picture;
    private ?string $description;
    private string $datetime;
    private int $is_published;

    // ID
    public function getId(): int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }

    // Title
    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }

    // Picture
    public function getPicture(): string { return $this->picture; }
    public function setPicture(string $picture): void { $this->picture = $picture; }

    // Description
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): void { $this->description = $description; }

    // Date
    public function getDatetime(): string { return $this->datetime; }
    public function setDatetime(string $datetime): void { $this->datetime = $datetime; }

    // is_published
    public function getIsPublished(): int { return $this->is_published; }
    public function setIsPublished(int $is_published): void { $this->is_published = $is_published; }
}
