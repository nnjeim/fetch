<?php

namespace Nnjeim\Fetch\Tests;

use Nnjeim\Fetch\FetchServiceProvider;
use Orchestra\Testbench\TestCase;
use Nnjeim\Fetch\Fetch;

class FetchTest extends TestCase {

    protected array $publicAPI = [
        'GET' => 'https://nnjeim.cloud/api/countries'
    ];

    /** @test */
    public function can_get_request() {

        ['response' => $response, 'status' => $status] = Fetch::get($this->publicAPI['GET']);

        $this->assertTrue($status == 200);
    }

    protected function getPackageProviders($app) {

        return [FetchServiceProvider::class];
    }

    protected function getPackageAliases($app) {
        return [
            'Fetch' => Fetch::class,
        ];
    }
}
