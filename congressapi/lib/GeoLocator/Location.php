<?php

class Location
{
    private $yqlUrl = 'http://query.yahooapis.com/v1/public/yql';

    private $locator;
    private $initialized = false;

    private $ip;
    private $status;
    private $countryCode;
    private $countryName;
    private $regionCode;
    private $regionName;
    private $city;
    private $zipPostalCode;
    private $latitude;
    private $longitude;
    private $timezone;
    private $gmtoffset;
    private $dstoffset;

    public function __construct($ip, Locator $locator)
    {
        $this->ip = $ip;
        $this->locator = $locator;
    }

    private function initialize()
    {
        if ($this->initialized === true)
        {
            return;
        }
        $this->initialized = true;
        $this->locator->initializeLocation($this);
    }

    public function getIp()
    {
        $this->initialize();
        return $this->ip;
    }

    public function getCountryCode()
    {
        $this->initialize();
        return $this->countryCode;
    }

    public function getCountryName()
    {
        $this->initialize();
        return $this->countryName;
    }

    public function getRegionCode()
    {
        $this->initialize();
        return $this->regionCode;
    }

    public function getRegionName()
    {
        $this->initialize();
        return $this->regionName;
    }

    public function getCity()
    {
        $this->initialize();
        return $this->city;
    }

    public function getZipPostalCode()
    {
        $this->initialize();
        return $this->zipPostalCode;
    }

    public function getLatitude()
    {
        $this->initialize();
        return $this->latitude;
    }

    public function getLongitude()
    {
        $this->initialize();
        return $this->longitude;
    }

    public function getTimezone()
    {
        $this->initialize();
        return $this->timezone;
    }

    public function getGmtOffset()
    {
        $this->initialize();
        return $this->gmtoffset;
    }

    public function getDstOffset()
    {
        $this->initialize();
        return $this->dstoffset;
    }

    public function toArray()
    {
        return array(
            'ip'            => $this->getIp(),
            'countryCode'   => $this->getCountryCode(),
            'countryName'   => $this->getCountryName(),
            'regionCode'    => $this->getRegionCode(),
            'regionName'    => $this->getRegionName(),
            'city'          => $this->getCity(),
            'zipPostalCode' => $this->getZipPostalCode(),
            'latitude'      => $this->getLatitude(),
            'longitude'     => $this->getLongitude(),
            'timezone'      => $this->getTimezone(),
            'gmtOffset'     => $this->getGmtOffset(),
            'dstOffset'     => $this->getDstOffset()
        );
    }
}