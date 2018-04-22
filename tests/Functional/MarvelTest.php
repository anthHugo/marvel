<?php

namespace Tests\Functional;

class MarvelTest extends BaseTestCase
{
	public function testConnectApi()
	{
		$response = $this->runApp('GET', '/api/list');

        $this->assertEquals(200, $response->getStatusCode());
	}

	public function testSansPage()
	{
		$response = $this->runApp('GET', '/api/list');

		$data = json_decode($response->getBody());
		
		$this->assertEquals(99, $data->offset);
		$this->assertEquals(20, $data->limit);
	}

	public function testAvecPage()
	{
		$response = $this->runApp('GET', '/api/list?page=1');

		$data = json_decode($response->getBody());
		$this->assertEquals(0, $data->offset);
		$this->assertEquals(20, $data->limit);
	}
}