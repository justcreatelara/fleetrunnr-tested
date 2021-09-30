<?php

namespace Jit\Fleetrunnr\Tests;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Jit\Fleetrunnr\Fleetrunnr;
use Orchestra\Testbench\TestCase;

class fleetrunnrTest extends TestCase
{
    /** @test */
    public function a_user_can_list_all_customers()
    {
        Http::fake();

        $client = new Fleetrunnr('token');
        $response = $client->customers()->list();

        Http::assertSent(function (Request $request) {
            return $request->hasHeader('Authorization', 'Bearer token') &&
                $request->url() === 'https://fleetrunnr.com/api/rest/customers';
        });
        self::assertTrue($response);
    }

    /** @test */
    public function a_user_can_update_a_customer()
    {
        Http::fake();
        $data = ["name" => "john"];

        $client = new Fleetrunnr('token');
        $response = $client->customers()->update($data, 1);

        Http::assertSent(function (Request $request) {
            return $request->hasHeader('Authorization', 'Bearer token') &&
                $request->url() === 'https://fleetrunnr.com/api/rest/customers/1' &&
                $request['name'] === 'john';
        });
        self::assertTrue($response);
    }
}