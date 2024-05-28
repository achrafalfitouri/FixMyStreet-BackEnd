<?php

namespace App\Tests\Entity;

use App\Entity\Region;
use App\Entity\Ville;
use App\Entity\Reclamation;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    public function testRegionCreation()
    {
        // Création d'une région
        $region = new Region();
        $region
            ->setNom('Nom de la région')
            ->setCreatedAt(new \DateTimeImmutable());

        // Vérification des valeurs
        $this->assertEquals('Nom de la région', $region->getNom());
        $this->assertInstanceOf(\DateTimeImmutable::class, $region->getCreatedAt());
    }

    public function testReclamationsCollection()
    {
        // Création d'une région avec des réclamations
        $region = new Region();
        $reclamation1 = new Reclamation();
        $reclamation2 = new Reclamation();

        $region->addReclamation($reclamation1);
        $region->addReclamation($reclamation2);

        // Vérification de l'ajout de réclamations
        $this->assertCount(2, $region->getReclamations());
        $this->assertTrue($region->getReclamations()->contains($reclamation1));
        $this->assertTrue($region->getReclamations()->contains($reclamation2));

        // Suppression d'une réclamation
        $region->removeReclamation($reclamation1);

        // Vérification de la suppression
        $this->assertCount(1, $region->getReclamations());
        $this->assertFalse($region->getReclamations()->contains($reclamation1));
        $this->assertTrue($region->getReclamations()->contains($reclamation2));
    }

    public function testVillesCollection()
    {
        // Création d'une région avec des villes
        $region = new Region();
        $ville1 = new Ville();
        $ville2 = new Ville();

        $region->addVille($ville1);
        $region->addVille($ville2);

        // Vérification de l'ajout de villes
        $this->assertCount(2, $region->getVilles());
        $this->assertTrue($region->getVilles()->contains($ville1));
        $this->assertTrue($region->getVilles()->contains($ville2));

        // Suppression d'une ville
        $region->removeVille($ville1);

        // Vérification de la suppression
        $this->assertCount(1, $region->getVilles());
        $this->assertFalse($region->getVilles()->contains($ville1));
        $this->assertTrue($region->getVilles()->contains($ville2));
    }
}
