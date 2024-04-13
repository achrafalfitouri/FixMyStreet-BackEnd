<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource
(operations: [
    new GetCollection(),
    new Post(
       
        inputFormats: ['multipart' => ['multipart/form-data']],
        denormalizationContext: ['groups' => ['reclamation']]
    ),
    new Get(),
    new Put(),
    new Delete(),
    new Patch() 
])]


#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ApiFilter(SearchFilter::class, strategy: 'word_start')]
#[ApiFilter(OrderFilter::class, properties: ['created_at' => 'DESC'])]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[Groups('reclamation')]
    #[Vich\UploadableField(mapping: 'reclamation', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Groups('reclamation')]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[Groups('reclamation')]
    #[ORM\Column(length: 255)]
    private ?string $objet = null;


    #[Groups('reclamation')]
    #[ORM\Column(length: 255)]
    private ?string $status = null;



   

    #[Groups('reclamation')]  
    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    
    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?User $user_id = null;

    
    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Reclamant $reclamant = null;

 
    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Region $region= null;

    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Ville $ville = null;


  
    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Quartier $quartier = null;
   
    #[Groups('reclamation')] 
    #[ORM\Column(length: 255)]
    private ?string $Type = null;

  
    public function getId(): ?int
    {
        return $this->id;
    }













    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getUserId(): ?User
    {
        return $this->user_id;
    }
    #[Groups('reclamation')] 
    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
    #[Groups('reclamation')]
    public function getReclamantId(): ?Reclamant
    {
        return $this->reclamant;
    }

    public function setReclamantId(?Reclamant $reclamant): static
    {
        $this->reclamant = $reclamant;

        return $this;
    }
#[Groups('reclamation')] 
    public function getRegionId(): ?Region
    {
        return $this->region;
    }
    #[Groups('reclamation')] 
    public function setRegionId(?Region $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getVilleId(): ?Ville
    {
        return $this->ville;
    }
    #[Groups('reclamation')] 
    public function setVilleId(?Ville $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getQuartierId(): ?Quartier
    {
        return $this->quartier;
    }
    #[Groups('reclamation')] 
    public function setQuartierId(?Quartier $quartier): static
    {
        $this->quartier = $quartier;

        return $this;
    }


    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

  
}
