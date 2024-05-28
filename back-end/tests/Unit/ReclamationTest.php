<?php

namespace App\Tests\Entity;

use App\Entity\Reclamation;
use App\Entity\Reclamant;
use App\Entity\User;
use App\Entity\Region;
use App\Entity\Ville;
use App\Entity\Quartier;
use PHPUnit\Framework\TestCase;

class ReclamationTest extends TestCase
{
    public function testReclamationCreation()
    {
        // Création des entités nécessaires (remplacez par des mocks si nécessaire)
        $reclamant = new Reclamant();
        $user = new User();
        $region = new Region();
        $ville = new Ville();
        $quartier = new Quartier();

        // Création d'une réclamation
        $reclamation = new Reclamation();
        $reclamation
            ->setDescription('Description de la réclamation')
            ->setObjet('Objet de la réclamation')
            ->setStatus('En attente')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('Type de réclamation')
            ->setReclamantId($reclamant)
            ->setUserId($user)
            ->setRegionId($region)
            ->setVilleId($ville)
            ->setQuartierId($quartier);

        // Vérification des valeurs
        $this->assertEquals('Description de la réclamation', $reclamation->getDescription());
        $this->assertEquals('Objet de la réclamation', $reclamation->getObjet());
        $this->assertEquals('En attente', $reclamation->getStatus());
        $this->assertInstanceOf(\DateTimeImmutable::class, $reclamation->getCreatedAt());
        $this->assertEquals('Type de réclamation', $reclamation->getType());
        $this->assertSame($reclamant, $reclamation->getReclamantId());
        $this->assertSame($user, $reclamation->getUserId());
        $this->assertSame($region, $reclamation->getRegionId());
        $this->assertSame($ville, $reclamation->getVilleId());
        $this->assertSame($quartier, $reclamation->getQuartierId());
    }
}
