<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock = 0;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $zone;

    /**
     * @ORM\ManyToMany(targetEntity=Box::class, mappedBy="items")
     */
    private $boxes;

    /**
     * @ORM\OneToMany(targetEntity=Entry::class, mappedBy="item")
     */
    private $entries;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock0;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $unit;

    public function __construct()
    {
        $this->boxes = new ArrayCollection();
        $this->entries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection|Box[]
     */
    public function getBoxes(): Collection
    {
        return $this->boxes;
    }

    public function addBox(Box $box): self
    {
        if (!$this->boxes->contains($box)) {
            $this->boxes[] = $box;
            $box->addItem($this);
        }

        return $this;
    }

    public function removeBox(Box $box): self
    {
        if ($this->boxes->removeElement($box)) {
            $box->removeItem($this);
        }

        return $this;
    }

    /**
     * @return Collection|Entry[]
     */
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    public function addEntry(Entry $entry): self
    {
        if (!$this->entries->contains($entry)) {
            $this->entries[] = $entry;
            $entry->setItem($this);
        }

        return $this;
    }

    public function removeEntry(Entry $entry): self
    {
        if ($this->entries->removeElement($entry)) {
            // set the owning side to null (unless already changed)
            if ($entry->getItem() === $this) {
                $entry->setItem(null);
            }
        }

        return $this;
    }

    public function addStock(int $n)
    {
        $s = $this->getStock() + $n;
        $this->setStock($s);
    }

    public function minusStock(int $n)
    {
        $s = $this->getStock() - $n;
        $this->setStock($s);
    }

    public function getStock0(): ?int
    {
        return $this->stock0;
    }

    public function setStock0(?int $stock0): self
    {
        $this->stock0 = $stock0;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
