<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

    
class UserController extends AbstractController
{
    private $tokenStorage;
    private $jwtManager;

    public function __construct(TokenStorageInterface $tokenStorage, JWTTokenManagerInterface $jwtManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->jwtManager = $jwtManager;
    }

// =================== GET USER ID FROM JWT TOKEN =================

#[Route('/api/user/me', methods: ['GET'])]
public function getCurrentUser()
{
    $token = $this->tokenStorage->getToken();

    if (!$token) {
        throw new \Exception('Utilisateur est introuvable !');
    }

    $user = $token->getUser();

    $dataUser = [
        'id' => $user->getId(),
        'email' => $user->getemail(),
        'numTel' => $user->getNumTel(),
        'NomComplet' => $user->getNomComplet(),
        'roles' => $user->getRoles(),
        'cin' => $user->getCin(),
        'service' => $user->getService(),
        'ville' => $user->getVille(),
    ];

    return $this->json($dataUser);
}

}
