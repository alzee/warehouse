<?php

namespace App\Entity;

use App\Repository\BackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BackRepository::class)
 */
class Back
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
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Take::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $take;

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

    public function __toString(): string
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function __construct()
    {
        $this->date = new \DateTimeImmutable();
        $this->date = $this->date->setTimezone(new \DateTimeZone('Asia/Shanghai'));
    }

    public function getTake(): ?Take
    {
        return $this->take;
    }

    public function setTake(?Take $take): self
    {
        $this->take = $take;

        return $this;
    }
}
