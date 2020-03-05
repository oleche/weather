<?php
namespace App\Util;

use App\Http\Middleware\WeatherClient;

class Weather
{
	protected $client;
	private $key;

	public function __construct(WeatherClient $client)
	{
		$this->key = env('WEATHER_KEY');
		$this->client = $client;
	}

	public function findByCity($name)
	{
		return $this->endpointRequest('?key='.$this->key.'&days=10&city='.$name);
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
