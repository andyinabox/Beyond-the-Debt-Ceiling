<?php

class GoogleMapImage
{
    private $width = '550';
    private $height = '550';
    private $maptype = 'roadmap';
    private $sensor = false;
    private $zoom = null;
    private $locations = array();

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setMaptype($maptype)
    {
        $this->maptype = $maptype;
    }

    public function setSensor($sensor)
    {
        $this->sensor = $sensor;
    }

    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    public function addLocation(Location $location)
    {
        $this->locations[] = $location;
    }

    public function getUrl()
    {
        $markers = array();
        foreach ($this->locations as $location)
        {
          $markers[] = 'color:blue|label:'.$location->getIp().'|'.$location->getLatitude().','.$location->getLongitude();
        }
        $markers = '&markers='.implode('&markers=', $markers);
        return 'http://maps.google.com/maps/api/staticmap?zoom='.$this->zoom.'&size='.$this->width.'x'.$this->height.'&maptype='.$this->maptype.'&sensor='.($this->sensor ? 'true' : 'false').$markers;
    }

    public function getHTMLImageTag()
    {
        return '<img src="'.$this->getUrl().'" width="'.$this->width.'" height="'.$this->height.'" />';
    }

    public function __toString()
    {
        return $this->getHTMLImageTag();
    }
}