<?php

namespace BFCMobileTests\BFCPages;

//use Facebook\WebDriver;
use SebastianBergmann\CodeCoverage\Report\PHP;

require_once '.\vendor\autoload.php';

class BasePage
{
    protected $driver;
    protected $globalTimeOut=60;
    public function __construct(\RemoteWebDriver $driver) {
        $this->driver = $driver;
        $this->driver->manage()->timeouts()->implicitlyWait( $this->globalTimeOut);

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
        $this->writeToConsole('Try find :'.$ByElemet->getValue());
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
        $this->driver->manage()->timeouts()->implicitlyWait($this->globalTimeOut);
    }
    protected function waitForElementDisappear($ByElement,$timeout=60) {
        $this->writeToConsole('wait For Disappear :'.$ByElement->getValue());
        $this->driver->manage()->timeouts()->implicitlyWait(1);
        try {
            $this->driver->wait($timeout, 200)->until(
                \WebDriverExpectedCondition::invisibilityOfElementLocated($ByElement));
        } catch (\Exception $e) {// zmienić StaleElementReferenceException
            return false;
        }
        finally
        {
            $this->driver->manage()->timeouts()->implicitlyWait($this->globalTimeOut);
        }
    }


    protected function isDisplayed($ByElement,$timeout=2) {
        $this->writeToConsole('isDisplayed :'.$ByElement->getValue());
        $this->driver->manage()->timeouts()->implicitlyWait(1);
        try {
            $this->driver->wait($timeout, 200)->until(
                \WebDriverExpectedCondition::visibilityOfElementLocated($ByElement));
            return true;
        } catch (\Exception $e) {
            return false;
        }
        finally
        {
            $this->driver->manage()->timeouts()->implicitlyWait($this->globalTimeOut);
        }

    }

    public function tap($ByElement)
    {
        $this->writeToConsole('Tap :'.$ByElement->getValue());
        $el=$this->driver->findElement($ByElement);
        //$this->writeToConsole('-'.$el->getAttribute('name').'-');
         $el->Click();
    }

    public  function getTextFromAllElemets() // przydatny w przypadku problemów z kodowaniem
    {
        $allElements= $this->driver->findElements(\WebDriverBy::xpath("//*"));
        foreach($allElements as $el)
        {
            $this->writeToConsole($el->getTagName().'-'.$el->getAttribute('name').'-');
        }

    }

    public  function Back()
    {

    }
}