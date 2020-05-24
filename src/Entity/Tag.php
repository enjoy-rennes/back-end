<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Help", mappedBy="tag")
     */
    private $helps;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Advantage", mappedBy="tag")
     */
    private $advantages;


    public function __construct()
    {
        $this->helps = new ArrayCollection();
        $this->advantages = new ArrayCollection();
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

    /**
     * @return Collection|Help[]
     */
    public function getHelps(): Collection
    {
        return $this->helps;
    }

    public function addHelp(Help $help): self
    {
        if (!$this->helps->contains($help)) {
            $this->helps[] = $help;
            $help->addTag($this);
        }

        return $this;
    }

    public function removeHelp(Help $help): self
    {
        if ($this->helps->contains($help)) {
            $this->helps->removeElement($help);
            $help->removeTag($this);
        }

        return $this;
    }

    /**
     * @return Collection|Advantage[]
     */
    public function getAdvantages(): Collection
    {
        return $this->advantages;
    }

    public function addAdvantage(Advantage $advantage): self
    {
        if (!$this->advantages->contains($advantage)) {
            $this->advantages[] = $advantage;
            $advantage->addTag($this);
        }

        return $this;
    }

    public function removeAdvantage(Advantage $advantage): self
    {
        if ($this->advantages->contains($advantage)) {
            $this->advantages->removeElement($advantage);
            $advantage->removeTag($this);
        }

        return $this;
    }



    
}
