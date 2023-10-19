<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpellRepository::class)]
class Spell
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $vocal = null;

    #[ORM\Column]
    private ?bool $somatic = null;

    #[ORM\Column]
    private ?bool $material = null;

    #[ORM\Column(length: 255)]
    private ?string $prepareTime = null;

    #[ORM\Column(length: 255)]
    private ?string $activeTime = null;

    #[ORM\Column(length: 255)]
    private ?string $distance = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?array $extra = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isVocal(): ?bool
    {
        return $this->vocal;
    }

    public function setVocal(bool $vocal): static
    {
        $this->vocal = $vocal;

        return $this;
    }

    public function isSomatic(): ?bool
    {
        return $this->somatic;
    }

    public function setSomatic(bool $somatic): static
    {
        $this->somatic = $somatic;

        return $this;
    }

    public function isMaterial(): ?bool
    {
        return $this->material;
    }

    public function setMaterial(bool $material): static
    {
        $this->material = $material;

        return $this;
    }

    public function getPrepareTime(): ?string
    {
        return $this->prepareTime;
    }

    public function setPrepareTime(string $prepareTime): static
    {
        $this->prepareTime = $prepareTime;

        return $this;
    }

    public function getActiveTime(): ?string
    {
        return $this->activeTime;
    }

    public function setActiveTime(string $activeTime): static
    {
        $this->activeTime = $activeTime;

        return $this;
    }

    public function getDistance(): ?string
    {
        return $this->distance;
    }

    public function setDistance(string $distance): static
    {
        $this->distance = $distance;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getExtra(): ?array
    {
        return $this->extra;
    }

    public function setExtra(?array $extra): static
    {
        $this->extra = $extra;

        return $this;
    }
}
