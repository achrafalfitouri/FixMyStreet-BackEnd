<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\QuartierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ApiFilter(SearchFilter::class, strategy: 'word_start')]
#[ApiFilter(OrderFilter::class, properties: ['created_at' => 'DESC'])]
#[ORM\Entity(repositoryClass: QuartierRepository::class)]
class Quartier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(targetEntity: Reclamation::class, mappedBy: 'quartier')]
    private Collection $reclamations;

    #[ORM\ManyToOne(inversedBy: 'quartiers')]
    private ?Ville $ville = null;

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
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
            $reclamation->setQuartierId($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getQuartierId() === $this) {
                $reclamation->setQuartierId(null);
            }
        }

        return $this;
    }

    public function getVilleId(): ?Ville
    {
        return $this->ville;
    }

    public function setVilleId(?Ville $ville_id): static
    {
        $this->ville = $ville_id;

        return $this;
    }
}
