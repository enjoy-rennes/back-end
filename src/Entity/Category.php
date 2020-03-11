<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Help", mappedBy="category_type", cascade={"persist", "remove"})
     */
    private $help;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHelp(): ?Help
    {
        return $this->help;
    }

    public function setHelp(Help $help): self
    {
        $this->help = $help;

        // set the owning side of the relation if necessary
        if ($help->getCategoryType() !== $this) {
            $help->setCategoryType($this);
        }

        return $this;
    }

}
