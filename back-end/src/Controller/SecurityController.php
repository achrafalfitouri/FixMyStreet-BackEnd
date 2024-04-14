<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Doctrine\DBAL\Connection;

class SecurityController extends AbstractController
{

    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @Route("/logout", name="app_logout", methods={"POST"})
     */
    #[Route('/logout', methods: ['POST'])]
    public function logout(Request $request, JWTTokenManagerInterface $jwtManager): Response
    {
        // Retrieve the refresh token from the request
        $refreshToken = $request->cookies->get('refresh_token');

 
        $query = 'TRUNCATE TABLE refresh_tokens';
        $statement = $this->connection->prepare($query);
        $statement->executeQuery();

        // Generate the JSON response
        $response = new Response();
        $response->headers->clearCookie('token');
        $response->headers->clearCookie('refresh_token');

        return $response;
    }
}
