<?php

class Locator
{
    private $yqlUrl = 'http://query.yahooapis.com/v1/public/yql';
    private $locationReflClass;
    private $locationReflProperties = array();

    public function getGeoLocation($ip)
    {
        return new Location($ip, $this);
    }

    public function initializeLocation(Location $location)
    {
        $query = sprintf("select * from ip.location where ip='%s'", $location->getIp());
        $queryUrl = $this->yqlUrl."?q=" . urlencode($query)."&format=json&env=".urlencode("store://datatables.org/alltableswithkeys");
        $json = file_get_contents($queryUrl);
        if ($json !== false)
        {
            $data = json_decode($json)->query->results->Response;
            foreach ($data as $key => $value)
            {
                $key = lcfirst($key);
                $property = $this->getLocationReflProperty($key);
                $property->setValue($location, $value);
            }
        }
    }

    public function getGoogleMapImageForIps(array $ips)
    {
        $image = new GoogleMapImage();
        foreach ($ips as $ip)
        {
            $image->addLocation($this->getGeoLocation($ip));
        }
        return $image;
    }

    public function  getGoogleMapImageForIp($ip)
    {
        $image = new GoogleMapImage();
        $image->addLocation($this->getGeoLocation($ip));
        return $image;
    }

    private function getLocationReflClass()
    {
        if (!isset($this->locationReflClass))
        {
            $this->locationReflClass = new \ReflectionClass('GeoLocator\Location');
        }
        return $this->locationReflClass;
    }

    private function getLocationReflProperty($name)
    {
        if (!isset($this->locationReflProperties[$name]))
        {
            $property = $this->getLocationReflClass()->getProperty($name);
            $property->setAccessible(true);
            $this->locationReflProperties[$name] = $property;
        }
        return $this->locationReflProperties[$name];
    }
}