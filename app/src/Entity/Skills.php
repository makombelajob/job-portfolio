<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillsRepository::class)]
class Skills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $level = null;

    /**
     * @var Collection<int, Projets>
     */
    #[ORM\ManyToMany(targetEntity: Projets::class, mappedBy: 'skills')]
    private Collection $projets;

    /**
     * @var Collection<int, Educations>
     */
    #[ORM\ManyToMany(targetEntity: Educations::class, mappedBy: 'skills')]
    private Collection $educations;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
        $this->educations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, Projets>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projets $projet): static
    {
        if (!$this->projets->contains($projet)) {
            $this->projets->add($projet);
            $projet->addSkill($this);
        }

        return $this;
    }

    public function removeProjet(Projets $projet): static
    {
        if ($this->projets->removeElement($projet)) {
            $projet->removeSkill($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Educations>
     */
    public function getEducations(): Collection
    {
        return $this->educations;
    }

    public function addEducation(Educations $education): static
    {
        if (!$this->educations->contains($education)) {
            $this->educations->add($education);
            $education->addSkill($this);
        }

        return $this;
    }

    public function removeEducation(Educations $education): static
    {
        if ($this->educations->removeElement($education)) {
            $education->removeSkill($this);
        }

        return $this;
    }
}
