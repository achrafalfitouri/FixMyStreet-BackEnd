<?php

namespace App\Tests\Entity;

use App\Entity\Reclamant;
use App\Entity\Reclamation;
use PHPUnit\Framework\TestCase;

class ReclamantTest extends TestCase
{
    public function testSetNom()
    {
        $reclamant = new Reclamant();
        $reclamant->setNom('Doe');

        $this->assertEquals('Doe', $reclamant->getNom());
    }

    public function testAddReclamation()
    {
        $reclamant = new Reclamant();
        $reclamation = new Reclamation(); // Assurez-vous d'importer la classe Reclamation

        $reclamant->addReclamation($reclamation);

        $this->assertTrue($reclamant->getReclamations()->contains($reclamation));
        $this->assertEquals($reclamant, $reclamation->getReclamantId());
    }
}
