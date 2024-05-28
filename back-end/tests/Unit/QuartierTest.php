<?php


namespace App\Tests\Entity;

use App\Entity\Quartier;
use App\Entity\Reclamation;
use App\Entity\Ville;
use PHPUnit\Framework\TestCase;

class QuartierTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $quartier = new Quartier();
        
        // Test `setNom` and `getNom`
        $quartier->setNom('Test Quartier');
        $this->assertEquals('Test Quartier', $quartier->getNom());

        // Test `setCreatedAt` and `getCreatedAt`
        $createdAt = new \DateTimeImmutable();
        $quartier->setCreatedAt($createdAt);
        $this->assertEquals($createdAt, $quartier->getCreatedAt());

        // Test `setVilleId` and `getVilleId`
        $ville = new Ville();
        $quartier->setVilleId($ville);
        $this->assertEquals($ville, $quartier->getVilleId());
    }

    public function testReclamations()
    {
        $quartier = new Quartier();
        $reclamation = new Reclamation();
        
        // Test `addReclamation`
        $quartier->addReclamation($reclamation);
        $this->assertCount(1, $quartier->getReclamations());
        $this->assertTrue($quartier->getReclamations()->contains($reclamation));

        // Test `removeReclamation`
        $quartier->removeReclamation($reclamation);
        $this->assertCount(0, $quartier->getReclamations());
        $this->assertFalse($quartier->getReclamations()->contains($reclamation));
    }
}
