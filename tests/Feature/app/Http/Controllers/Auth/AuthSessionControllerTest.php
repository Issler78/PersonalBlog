<?php

namespace Tests\Feature\app\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

class AuthSessionControllerTest extends TestCase
{
    public function test_create_and_validate_token(): void
    {
        $payload = [
            'title' => 'test',
            'body' => 'test',
            'exp' => time() + (14 * 24 * 60 * 60)
        ];

        $secretKey = "HSJDECNSJDIWHDMCSGU";

        $token = JWT::encode($payload, $secretKey, 'HS256');

        $expectedPayload = $this->validateToken($token);

        $this->assertNotNull($expectedPayload);
        $this->assertEquals($expectedPayload, $payload);
    }

    private function validateToken(string $token)
    {
        $secretKey = "HSJDECNSJDIWHDMCSGU";

        try 
        {
            // Get Token

            $payload = JWT::decode($token, new Key($secretKey, 'HS256'));
            if ($payload->exp > time())
            {
                return (array) $payload;
            }

            var_dump("Token Expired");
            return null;
            
        } catch (\Exception $e) {
            var_dump("Token is invalid: " . $e->getMessage());
            return null;
        }  
    }
}
