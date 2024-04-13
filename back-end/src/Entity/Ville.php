<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ApiFilter(SearchFilter::class, strategy: 'word_start')]
#[ApiFilter(OrderFilter::class, properties: ['created_at' => 'DESC'])]
#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
 
    #[ORM\Column(length: 255)]
    private ?string $nom = null;
    
 
    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;
    
    #[ORM\OneToMany(targetEntity: Reclamation::class, mappedBy: 'ville')]
    private Collection $reclamations;
    

    #[ORM\ManyToOne(inversedBy: 'villes')]
    private ?Region $region = null;
  
    #[ORM\OneToMany(targetEntity: Quartier::class, mappedBy: 'ville')]
    private Collection $quartiers;

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
        $this->quartiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): static
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations->add($reclamation);
            $reclamation->setVilleId($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getVilleId() === $this) {
                $reclamation->setVilleId(null);
            }
        }

        return $this;
    }

    public function getRegionId(): ?Region
    {
        return $this->region;
    }

    public function setRegionId(?Region $region): static
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection<int, Quartier>
     */
    public function getQuartiers(): Collection
    {
        return $this->quartiers;
    }

    public function addQuartier(Quartier $quartier): static
    {
        if (!$this->quartiers->contains($quartier)) {
            $this->quartiers->add($quartier);
            $quartier->setVilleId($this);
        }

        return $this;
    }

    public function removeQuartier(Quartier $quartier): static
    {
        if ($this->quartiers->removeElement($quartier)) {
            // set the owning side to null (unless already changed)
            if ($quartier->getVilleId() === $this) {
                $quartier->setVilleId(null);
            }
        }

        return $this;
    }
}
