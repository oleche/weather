<?php
namespace App\Http\Middleware;

use GuzzleHttp\Client;

class WeatherClient extends Client {
  function __construct($args = array()){
    parent::__construct( $args );
  }
}

 ?>
