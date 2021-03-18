<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogRepository::class)
 */
class Log
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $box;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $direction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getBox(): ?string
    {
        return $this->box;
    }

    public function setBox(string $box): self
    {
        $this->box = $box;

        return $this;
    }

    public function getDirection(): ?bool
    {
        return $this->direction;
    }

    public function setDirection(?bool $direction): self
    {
        $this->direction = $direction;

        return $this;
    }
}
