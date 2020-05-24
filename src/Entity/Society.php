<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocietyRepository")
 */
class Society
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", inversedBy="society", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Card", cascade={"persist", "remove"})
     */
    private $card;

    

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Actuality", cascade={"persist", "remove"})
     */
    private $actuality;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Help", mappedBy="society")
     */
    private $helps;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Advantage", mappedBy="society")
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

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }
    

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

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

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCard(): ?Card
    {
        return $this->card;
    }

    public function setCard(?Card $card): self
    {
        $this->card = $card;

        return $this;
    }

    

    public function getActuality(): ?Actuality
    {
        return $this->actuality;
    }

    public function setActuality(?Actuality $actuality): self
    {
        $this->actuality = $actuality;

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
            $help->addSociety($this);
        }

        return $this;
    }

    public function removeHelp(Help $help): self
    {
        if ($this->helps->contains($help)) {
            $this->helps->removeElement($help);
            $help->removeSociety($this);
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
            $advantage->addSociety($this);
        }

        return $this;
    }

    public function removeAdvantage(Advantage $advantage): self
    {
        if ($this->advantages->contains($advantage)) {
            $this->advantages->removeElement($advantage);
            $advantage->removeSociety($this);
        }

        return $this;
    }

   


    
}
