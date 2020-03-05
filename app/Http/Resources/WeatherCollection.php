<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WeatherCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $data = $this->collection
                    ->map
                    ->toArray($request)
                    ->all();
      $average = 0;
      foreach ($data as $value) {
        $average += $value['temp'];
      }
      $average = $average/10;

      return [
        'data' => $data,
        'average' => $average
      ];
    }
}
