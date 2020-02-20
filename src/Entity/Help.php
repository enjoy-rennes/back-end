<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HelpRepository")
 */
class Help
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FinanceHelp", inversedBy="helps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $finance_help;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HousingHelp", inversedBy="helps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing_help;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ReductionHelp", inversedBy="helps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reduction_help;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TransportHelp", inversedBy="helps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transport_Help;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFinanceHelp(): ?FinanceHelp
    {
        return $this->finance_help;
    }

    public function setFinanceHelp(?FinanceHelp $finance_help): self
    {
        $this->finance_help = $finance_help;

        return $this;
    }

    public function getHousingHelp(): ?HousingHelp
    {
        return $this->housing_help;
    }

    public function setHousingHelp(?HousingHelp $housing_help): self
    {
        $this->housing_help = $housing_help;

        return $this;
    }

    public function getReductionHelp(): ?ReductionHelp
    {
        return $this->reduction_help;
    }

    public function setReductionHelp(?ReductionHelp $reduction_help): self
    {
        $this->reduction_help = $reduction_help;

        return $this;
    }

    public function getTransportHelp(): ?TransportHelp
    {
        return $this->transport_Help;
    }

    public function setTransportHelp(?TransportHelp $transport_Help): self
    {
        $this->transport_Help = $transport_Help;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
