<?php
namespace App\Util;

use App\Http\Middleware\CitiesClient;

class Cities
{
	protected $client;

	public function __construct(CitiesClient $client)
	{
		$this->client = $client;
	}

	public function findByName($name)
	{
		return $this->endpointRequest('?limit=5&namePrefix='.$name);
	}

	public function endpointRequest($url)
	{
		try {
      $response = $this->client->request('GET', $url);
		} catch (\Exception $e) {
      return [];
		}

		return $this->response_handler($response->getBody()->getContents());
	}

	public function response_handler($response)
	{
		if ($response) {
			return json_decode($response);
		}

		return [];
	}
}
