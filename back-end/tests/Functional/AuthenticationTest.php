<?php

namespace App\Tests\Functional;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationTest extends WebTestCase
{
    private $accessToken;
    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        parent::setUp();
    }

    private function authenticateClient(): void
    {
        $this->client->request('POST', '/auth', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'email' => 'admin@gmail.com',
            'password' => '123456',
        ]));

        $response = $this->client->getResponse();
        $responseData = json_decode($response->getContent(), true);

        $this->accessToken = $responseData['token'];
    }

    public function testSuccessfulAuthentication(): void
    {
        $this->authenticateClient();

        $this->client->request('GET', '/api/user/me', [], [], ['CONTENT_TYPE' => 'application/json', 'HTTP_AUTHORIZATION' => 'Bearer ' . $this->accessToken]);

        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
        $this->assertJson($response->getContent());

        $responseData = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('email', $responseData);
        $this->assertEquals('admin@gmail.com', $responseData['email']);
    }
}
