<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IllnessRepository")
 */
class Illness
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Patient", mappedBy="illness")
     */
    private $patients;

    public function __construct()
    {
        $this->therapy = new ArrayCollection();
        $this->patients = new ArrayCollection();
    }

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
     * @return Collection|Therapy[]
     */
    public function getTherapy(): Collection
    {
        return $this->therapy;
    }

    public function addTherapy(Therapy $therapy): self
    {
        if (!$this->therapy->contains($therapy)) {
            $this->therapy[] = $therapy;
            $therapy->setIllness($this);
        }

        return $this;
    }

    public function removeTherapy(Therapy $therapy): self
    {
        if ($this->therapy->contains($therapy)) {
            $this->therapy->removeElement($therapy);
            // set the owning side to null (unless already changed)
            if ($therapy->getIllness() === $this) {
                $therapy->setIllness(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatients(): Collection
    {
        return $this->patients;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patients->contains($patient)) {
            $this->patients[] = $patient;
            $patient->setIllness($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patients->contains($patient)) {
            $this->patients->removeElement($patient);
            // set the owning side to null (unless already changed)
            if ($patient->getIllness() === $this) {
                $patient->setIllness(null);
            }
        }

        return $this;
    }
}
