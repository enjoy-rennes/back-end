<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransportHelpRepository")
 */
class TransportHelp
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Help", mappedBy="transport_Help")
     */
    private $helps;

    public function __construct()
    {
        $this->helps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $help->setTransportHelp($this);
        }

        return $this;
    }

    public function removeHelp(Help $help): self
    {
        if ($this->helps->contains($help)) {
            $this->helps->removeElement($help);
            // set the owning side to null (unless already changed)
            if ($help->getTransportHelp() === $this) {
                $help->setTransportHelp(null);
            }
        }

        return $this;
    }
}
