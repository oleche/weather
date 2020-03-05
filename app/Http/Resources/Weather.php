<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Weather extends JsonResource
{
    private $mapping = array(200=>"hot",
                   201=>"stormy",
                   202=>"stormy",
                   230=>"stormy",
                   231=>"stormy",
                   232=>"stormy",
                   233=>"stormy",
                   300=>"breezy",
                   301=>"breezy",
                   302=>"breezy",
                   500=>"stormy",
                   501=>"stormy",
                   502=>"stormy",
                   511=>"stormy",
                   520=>"stormy",
                   522=>"stormy",
                   600=>"stormy",
                   601=>"breezy",
                   602=>"breezy",
                   611=>"cloudy",
                   612=>"cloudy",
                   622=>"breezy",
                   623=>"breezy",
                   700=>"cloudy",
                   711=>"cloudy",
                   721=>"cloudy",
                   731=>"cloudy",
                   741=>"cloudy",
                   751=>"cloudy",
                   800=>"hot",
                   801=>"cloudy",
                   802=>"cloudy",
                   803=>"cloudy",
                   804=>"cloudy",
                   900=>"cloudy",);
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
          'temp' => $this->resource->temp,
          'min_temp' => $this->resource->min_temp,
          'max_temp' => $this->resource->max_temp,
          'weather' => $this->mapping[$this->resource->weather->code],
          'datetime' => $this->resource->datetime
      ];
    }
}
