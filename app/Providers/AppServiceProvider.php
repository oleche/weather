<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\CitiesClient;
use App\Http\Middleware\WeatherClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      //weather
      $weatherUrl = 'https://api.weatherbit.io/v2.0/forecast/daily';

      $this->app->singleton('App\Http\Middleware\WeatherClient', function($api) use ($weatherUrl) {
        $weatherClient = new WeatherClient([
          'base_uri' => $weatherUrl
        ]);
        return $weatherClient;
      });

      //GeoDB Cities
      $geoDBUrl = 'https://wft-geo-db.p.rapidapi.com/v1/geo/cities';

      $this->app->singleton('App\Http\Middleware\CitiesClient', function($api) use ($geoDBUrl) {
        $geoKey = env('GEO_KEY');

        $headers = [
          'Content-Type' => 'application/json',
          'x-rapidapi-host' => 'wft-geo-db.p.rapidapi.com',
          'x-rapidapi-key' => $geoKey,
        ];
        $client = new CitiesClient([
          'base_uri' => $geoDBUrl,
          'headers' => $headers
        ]);
        return $client;
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
