<?php

namespace BFCMobileTests\BFCPages;

//use Facebook\WebDriver;
use SebastianBergmann\CodeCoverage\Report\PHP;

require_once '.\vendor\autoload.php';

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

        $this->writeToConsole( 'Try find: '.$selector["xpath"]);
        switch (true) {
            case isset($selector["css"]):
                return $this->driver->findElement(\WebDriverBy::cssSelector($selector["css"]));
                break;
            case isset($selector["xpath"]):
                return $this->driver->findElement(\WebDriverBy::xpath($selector["xpath"]));
                break;
            default:
                return $this->driver->findElement(\WebDriverBy::id($selector));
        }
    }
    public function writeToConsole($text)
    {
        fwrite(STDERR, print_r($text.PHP_EOL, TRUE));
    }

    protected  function findElement($ByElemet)
    {
        return $this->driver->findElement($ByElemet);
    }

    protected function waitForElement($getter) {
        return $this->driver->wait()->until(function() use ($getter) {
            try {
                return $this->{$getter}();
            } catch(\Exception $e) {
                return false;
            }
        });
    }
    //do poprwaki , zmienić na metode  wait()->until(function()
    protected function waitForElementDisappearOLD($ByElement,$timeout=60) {
        $this->driver->manage()->timeouts()->implicitlyWait(2);
        $timeCount=0;
        while ($timeCount<$timeout)
        {
            if ($this->isDisplayed($this->driver,$ByElement)==false)
                break;
            sleep(1);
            $timeCount++;
        }
        $this->driver->manage()->timeouts()->implicitlyWait($this->timeOut);
    }
    protected function waitForElementDisappear($ByElement,$timeout=60) {
        $this->driver->wait($timeout, 200)->until(
            \WebDriverExpectedCondition::invisibilityOfElementLocated($ByElement));
    }

    protected function isDisplayed($ByElement,$timeout=20) {
        try {
            $this->writeToConsole($timeout);
            $this->driver->wait($timeout, 200)->until(
                \WebDriverExpectedCondition::visibilityOfElementLocated($ByElement));
            return true;
        } catch (\StaleElementReferenceException $e) {// zmienić StaleElementReferenceException
            return false;
        }
    }

    public function tap($ByElement)
    {
        $this->driver->findElement($ByElement)->Click();
    }
}