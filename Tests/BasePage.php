<?php

namespace BFCMobileTests\Tests;


 class BasePage
{
    protected $driver;
    protected $timeOut=60;
    public function __construct(\RemoteWebDriver $driver) {
        $this->driver = $driver;
        $this->driver->manage()->timeouts()->implicitlyWait( $this->timeOut);

    }

    protected function find($selector)
    {
        switch (true) {
            case isset($selector["css"]):
                return $this->driver->findElement(WebDriverBy::cssSelector($selector["css"]));
                break;
            case isset($selector["xpath"]):
                return $this->driver->findElement(WebDriverBy::xpath($selector["xpath"]));
                break;
            default:
                return $this->driver->findElement(WebDriverBy::id($selector));
        }
    }

    protected function Click($ByElement)
    {
        $this->driver->findElement($ByElement)->Click();
    }
}