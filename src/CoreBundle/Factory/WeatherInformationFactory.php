<?php


namespace CoreBundle\Factory;

use CoreBundle\Entity\Weather\Information;

class WeatherInformationFactory
{
    public static function get(array $weatherData) : Information
    {
        $information = new Information();
        $information->setCreatedAt(new \DateTime("now"));
        $information->setLat($weatherData['lat']);
        $information->setLon($weatherData['lon']);
        $information->setCity($weatherData['city']);
        $information->setClouds($weatherData['clouds'] ?? null);
        $information->setTemperatureNow($weatherData['temperature']['now'] ?? null);
        $information->setTemperatureMin($weatherData['temperature']['min'] ?? null);
        $information->setTemperatureMax($weatherData['temperature']['max'] ?? null);
        $information->setWindDirection($weatherData['wind']['direction'] ?? null);
        $information->setWindSpeed($weatherData['wind']['speed'] ?? null);

        return $information;
    }
}