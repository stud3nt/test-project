<?php

namespace CoreBundle\Entity\Weather;

use CoreBundle\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

use CoreBundle\Entity\Traits\{
    CreatedAtTrait
};

/**
 * @ORM\Table(name="weather_information");
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\WeatherRepository")
 */

class Information extends AbstractEntity
{
    use CreatedAtTrait;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    protected $lat;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    protected $lon;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $city;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    protected $temperatureNow;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    protected $temperatureMin;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    protected $temperatureMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $windDirection;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $windSpeed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $clouds;

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Information
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param float $lon
     *
     * @return Information
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Information
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set temperatureNow
     *
     * @param float $temperatureNow
     *
     * @return Information
     */
    public function setTemperatureNow($temperatureNow)
    {
        $this->temperatureNow = $temperatureNow;

        return $this;
    }

    /**
     * Get temperatureNow
     *
     * @return float
     */
    public function getTemperatureNow()
    {
        return $this->temperatureNow;
    }

    /**
     * Set temperatureMin
     *
     * @param float $temperatureMin
     *
     * @return Information
     */
    public function setTemperatureMin($temperatureMin)
    {
        $this->temperatureMin = $temperatureMin;

        return $this;
    }

    /**
     * Get temperatureMin
     *
     * @return float
     */
    public function getTemperatureMin()
    {
        return $this->temperatureMin;
    }

    /**
     * Set temperatureMax
     *
     * @param float $temperatureMax
     *
     * @return Information
     */
    public function setTemperatureMax($temperatureMax)
    {
        $this->temperatureMax = $temperatureMax;

        return $this;
    }

    /**
     * Get temperatureMax
     *
     * @return float
     */
    public function getTemperatureMax()
    {
        return $this->temperatureMax;
    }

    /**
     * Set windDirection
     *
     * @param string $windDirection
     *
     * @return Information
     */
    public function setWindDirection($windDirection)
    {
        $this->windDirection = $windDirection;

        return $this;
    }

    /**
     * Get windDirection
     *
     * @return string
     */
    public function getWindDirection()
    {
        return $this->windDirection;
    }

    /**
     * Set windSpeed
     *
     * @param string $windSpeed
     *
     * @return Information
     */
    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    /**
     * Get windSpeed
     *
     * @return string
     */
    public function getWindSpeed()
    {
        return $this->windSpeed;
    }

    /**
     * Set clouds
     *
     * @param string $clouds
     *
     * @return Information
     */
    public function setClouds($clouds)
    {
        $this->clouds = $clouds;

        return $this;
    }

    /**
     * Get clouds
     *
     * @return string
     */
    public function getClouds()
    {
        return $this->clouds;
    }
}
