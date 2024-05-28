<?php

namespace App\Tests\Entity;

use App\Entity\Ville;
use App\Entity\Reclamation;
use App\Entity\Region;
use PHPUnit\Framework\TestCase;

class VilleTest extends TestCase
{
    public function testVilleCreation()
    {
        // Création d'une nouvelle ville
        $ville = new Ville();
        $ville
            ->setNom('Paris')
            ->setCreatedAt(new \DateTimeImmutable());

        // Vérification des valeurs
        $this->assertEquals('Paris', $ville->getNom());
        $this->assertInstanceOf(\DateTimeImmutable::class, $ville->getCreatedAt());
    }

 
}
