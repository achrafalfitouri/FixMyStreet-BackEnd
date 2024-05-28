<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Reclamation;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation()
    {
        // Création d'un utilisateur
        $user = new User();
        $user
            ->setEmail('test@example.com')
            ->setPassword('password')
            ->setNomComplet('John Doe')
            ->setVille('Paris')
            ->setCin('1234567890')
            ->setService('Customer Support')
            ->setNumTel('123456789')
            ->setCreatedAt(new \DateTimeImmutable());

        // Vérification des valeurs
        $this->assertEquals('test@example.com', $user->getEmail());
        $this->assertEquals(['ROLE_USER'], $user->getRoles()); // Vérifie que ROLE_USER est ajouté par défaut
        $this->assertEquals('John Doe', $user->getNomComplet());
        $this->assertEquals('Paris', $user->getVille());
        $this->assertEquals('1234567890', $user->getCin());
        $this->assertEquals('Customer Support', $user->getService());
        $this->assertEquals('123456789', $user->getNumTel());
        $this->assertInstanceOf(\DateTimeImmutable::class, $user->getCreatedAt());
    }

    public function testReclamationsCollection()
    {
        // Création d'un utilisateur avec des réclamations
        $user = new User();
        $reclamation1 = new Reclamation();
        $reclamation2 = new Reclamation();

        $user->addReclamation($reclamation1);
        $user->addReclamation($reclamation2);

        // Vérification de l'ajout de réclamations
        $this->assertCount(2, $user->getReclamations());
        $this->assertTrue($user->getReclamations()->contains($reclamation1));
        $this->assertTrue($user->getReclamations()->contains($reclamation2));

        // Suppression d'une réclamation
        $user->removeReclamation($reclamation1);

        // Vérification de la suppression
        $this->assertCount(1, $user->getReclamations());
        $this->assertFalse($user->getReclamations()->contains($reclamation1));
        $this->assertTrue($user->getReclamations()->contains($reclamation2));
    }
}
