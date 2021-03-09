<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $zone;

    /**
     * @ORM\Column(type="smallint")
     */
    private $warehouse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getWarehouse(): ?int
    {
        return $this->warehouse;
    }

    public function setWarehouse(int $warehouse): self
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    public function __toString(): string
    {
        return $this->zone;
    }
}
