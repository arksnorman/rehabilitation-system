<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TherapyRepository")
 */
class Therapy
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="therapies")
     */
    private $therapist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Illness", inversedBy="therapy")
     */
    private $illness;

    public function getId()
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

    public function getTherapist(): ?User
    {
        return $this->therapist;
    }

    public function setTherapist(?User $therapist): self
    {
        $this->therapist = $therapist;
        return $this;
    }

    public function getIllness(): ?Illness
    {
        return $this->illness;
    }

    public function setIllness(?Illness $illness): self
    {
        $this->illness = $illness;

        return $this;
    }
}
