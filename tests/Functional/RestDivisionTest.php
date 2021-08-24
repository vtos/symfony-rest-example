<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class RestDivisionTest extends TestCase
{
    /**
     * @test
     */
    public function divide_one_valid_number_by_another_valid_number(): void
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost:8000/api/division/1,54858/2');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $responseJson = $response->getContent();

        $this->assertJson($responseJson);

        $this->assertJsonStringEqualsJsonString(
            '{
                "error": "",
                "result": 0.77429
            }',
            $responseJson
        );
    }

    /**
     * @test
     */
    public function divide_invalid_number(): void
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost:8000/api/division/1,54,858/2');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $responseJson = $response->getContent();

        $this->assertJson($responseJson);

        $this->assertJsonStringEqualsJsonString(
            '{
                "error": "The value \"1.54.858\" does not match the expected pattern.",
                "result": false
            }',
            $responseJson
        );
    }
}
