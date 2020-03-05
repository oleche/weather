<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Weather;
use App\Http\Resources\WeatherCollection;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
  protected $weather;
  private $city;

  public function __construct(Weather $weather)
  {
    $this->weather = $weather;
  }

  public function fetch(Request $request)
  {
    $this->city = $request->city;
    $key = 'request|'.$request->url().'|'.$this->city;

    $data = Cache::remember($key, 30*60, function() {
      $weather = $this->weather->findByCity($this->city);
      return WeatherCollection::make($weather->data)->resolve();
    });

    return response()->json($data);
  }
}
