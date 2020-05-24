<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdvantageRepository")
 */
class Advantage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="advantages")
     */
    private $tag;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Society", inversedBy="advantages")
     */
    private $society;




    public function __construct()
    {

        $this->tag = new ArrayCollection();
        $this->society = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    /**
     * @return Collection|Tag[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tag->contains($tag)) {
            $this->tag->removeElement($tag);
        }

        return $this;
    }

    /**
     * @return Collection|Society[]
     */
    public function getSociety(): Collection
    {
        return $this->society;
    }

    public function addSociety(Society $society): self
    {
        if (!$this->society->contains($society)) {
            $this->society[] = $society;
        }

        return $this;
    }

    public function removeSociety(Society $society): self
    {
        if ($this->society->contains($society)) {
            $this->society->removeElement($society);
        }

        return $this;
    }

    
}
