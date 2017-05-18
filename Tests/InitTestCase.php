<?php

/**
 * Created by PhpStorm.
 * User: Rafał Pilecki
 * Date: 29.04.2017
 * Time: 14:06
 */
namespace BFCMobileTests\Tests;

use PHPUnit_Framework_TestCase;
require_once ('vendor\autoload.php');
//require_once('PHPUnit/Extensions/AppiumTestCase.php');
//require_once('PHPUnit/Extensions/AppiumTestCase/Element.php');
//require_once('PHPUnit/Extensions/AppiumTestCase.php');
//require_once('PHPUnit/Extensions/AppiumTestCase/Element.php');


abstract class InitTestCase extends \PHPUnit_Framework_TestCase
    //\PHPUnit_Extensions_AppiumTestCase
  //

{
    /**
     * @var \RemoteWebDriver
     */
    public  $driver;

    public static $static_driver;
    private static $capabilities;
    private static $screenshotDir="Screenshot";


    public static function setUpBeforeClass() {

            self::$static_driver = \RemoteWebDriver::create(static::getAppiummHost(), static::getCapabilities(),60000,60000);
    }

    public static function tearDownAfterClass() {
     //  self::$static_driver->close();
        self::$static_driver->quit();

    }

    protected static function getAppiummHost() {
        return "http://127.0.0.1:4723/wd/hub/";
    }

    protected static function getCapabilities() {
        self::$capabilities=  new \DesiredCapabilities();
      //  echo ;
        self::$capabilities->setCapability("app",dirname(__FILE__)."\..\bfc.apk");
        self::$capabilities->setCapability("platformName", "Android");
        self::$capabilities->setCapability("platformVersion", "5.0.1");
        self::$capabilities->setCapability( "browserName", "");
        self::$capabilities->setCapability("deviceName", "05a897ce0fa2f571");
        self::$capabilities->setCapability("app-package", "com.friendlysol.crm.bfctest");
        self::$capabilities->setCapability("app-activity", "com.friendlysol.crm.bfctest.MainActivity");
        self::$capabilities->setCapability("appWaitActivity", "com.friendlysol.crm.bfctest.MainActivity");
        //self::$capabilities->setCapability("appium-version", "1.3");
        return self::$capabilities;
    }
    protected function setUp() {
        $this->driver = self::$static_driver;
        fwrite(STDERR, print_r( '-->'.$this->getName().PHP_EOL, TRUE));
        if(!is_dir(self::$screenshotDir)){ mkdir(self::$screenshotDir, 0700,true);}

    }
    protected function tearDown() {
        $status = $this->getStatus();
        $screenshot = 'Screenshot/FAILURE_'.time().".png";
        if ($status == \PHPUnit_Runner_BaseTestRunner::STATUS_ERROR || $status == \PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE) {
            $this->driver->takeScreenshot($screenshot);
        }
    }

}