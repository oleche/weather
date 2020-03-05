<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Cities;
use App\Http\Resources\CityCollection;
use Illuminate\Support\Facades\Cache;

class CitiesController extends Controller
{
  protected $cities;
  private $name;

  public function __construct(Cities $cities)
  {
    $this->cities = $cities;
  }

  public function find(Request $request)
    {
      $this->name = $request->name;

      $key = 'request|'.$request->url();

      $cities = Cache::remember($key, 30*60, function() {
        $citiesData = $this->cities->findByName($this->name);
        return CityCollection::make($citiesData->data)->resolve();
      });
      return response()->json($cities);
    }
}
