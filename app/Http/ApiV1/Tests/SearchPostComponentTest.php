<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\getJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/suggests:search 200', function () {
    getJson('/api/v1/suggests:search')
        ->assertStatus(200);
});

test('GET /api/v1/suggests:search 400', function () {
    getJson('/api/v1/suggests:search')
        ->assertStatus(400);
});
