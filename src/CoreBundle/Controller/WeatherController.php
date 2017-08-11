<?php

namespace CoreBundle\Controller;

use Cmfcmf\OpenWeatherMap;
use CoreBundle\Factory\WeatherInformationFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class WeatherController extends Controller
{
    /**
     * @Method({"POST"})
     * @Route("/weather/info", name="weather_information", options={"expose"=true})
     */
    public function informationAction(Request $request) : JsonResponse
    {
        $coordinates = $request->get("coordinates");

        $weatherApi = new OpenWeatherMap();
        $weatherApi->setApiKey($this->getParameter('weatherapikey'));

        $weatherData = $weatherApi->getWeather($coordinates, 'metric', 'pl');

        $temperature = $weatherData->temperature;
        $wind = $weatherData->wind;

        $weatherArray = [
            'lat' => $coordinates['lat'],
            'lon' => $coordinates['lon'],
            'city' => $weatherData->city->name,
            'temperature' => [
                'now' => $temperature->now->getValue(),
                'min' => $temperature->min->getValue(),
                'max' => $temperature->max->getValue()
            ],
            'wind' => [
                "speed" => $wind->speed->getDescription(),
                "direction" => $wind->direction->getDescription()
            ],
            'clouds' => $weatherData->clouds->getDescription()
        ];

        $informationEntity = (new WeatherInformationFactory())::get($weatherArray);

        $em = $this->getDoctrine()->getManager();
        $em->persist($informationEntity);
        $em->flush();

        return new JsonResponse(
            $weatherArray
        );
    }
}
