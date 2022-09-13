<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {


        Http::fake([
            // Stub a JSON response for GitHub endpoints...
            'github.com/*' => Http::response([
                ['name' => 'my-repo'],
                ['name' => 'my-repo-2']
                ], 200),
        ]);
        Http::fake([
            // Stub a JSON response for GitHub endpoints...
            'api.openweathermap.org/*' => Http::response([
                "weather" =>[
                ["description" => "sunny"],
                ],
                "main" => [
                    "temp" => 997,
                    "feels_like" => 333,
                    "humidity" => 22
                    ]
        ], 200),
        ]);
        Http::fake([
            // Stub a JSON response for GitHub endpoints...
            'api.themoviedb.org/*' => Http::response([
               'results' => [
                   ['title' => 'movie1'],
                   ['title' => 'movie2'],
               ]
            ], 200),
        ]);

        $response = $this->get('/http-client');

        $response->assertSee('my-repo');
        $response->assertSee('my-repo-2');
        $response->assertSee('sunny');
        $response->assertSee('997');
        $response->assertSee('333');
        $response->assertSee('movie1');
        $response->assertSee('movie2');

        $response->assertStatus(200);
    }


}
