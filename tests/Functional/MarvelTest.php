<?php

namespace Tests\Functional;

class MarvelTest extends BaseTestCase
{
	public function testConnectApi()
	{
		$response = $this->runApp('GET', '/api/list');

        $this->assertEquals(200, $response->getStatusCode());
	}

}