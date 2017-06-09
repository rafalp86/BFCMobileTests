<?php

/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 24.05.2017
 * Time: 06:31
 */
use \BFCMobileTests\BFCPages\BasePage;

require_once('PHPUnit/Extensions/AppiumTestCase/MultiAction.php');
require_once('PHPUnit/Extensions/AppiumTestCase/Driver.php');
class Gestures extends BasePage
{
     public function __construct(\RemoteWebDriver $driver)
    {
         parent::__construct($driver);
    }
    public function ScollTo($elementBy,$useSmallSteps=false)
    {
        $FrameSize= $this->driver->manage()->window()->getSize();
        $maxLoop=3;
        $loopCount=0;
        $ScreenHeight=$FrameSize->getHeight();
        $startX=$ScreenHeight-50;
        $endX=$ScreenHeight/10;     
        if($useSmallSteps)
        {
             $maxLoop=3;
             $startX=$ScreenHeight/2;
             $endX=$ScreenHeight/2-20;  
        }
            
        $this->writeToConsole("Scroll to: ".$elementBy->getValue());
        $this->writeToConsole("Scroll H: ".$FrameSize->getHeight()." W: ".$FrameSize->getWidth());
        while(!$this->isDisplayed($elementBy, 1) )
        {
            $loopCount++;
            $this->Scroll($FrameSize->getWidth()/2,$startX, $FrameSize->getWidth()/3, $endX);
            if($loopCount>$loopCount)
                return;           
        }


    }
    public function Scroll($startX, $startY, $endX, $endY, $duration=800)
    {
        $this->writeToConsole("X ".$startX." Y ".$startY." XEnd ".$endX." YEnd ".$endY);
        $seleniumUrl= new \PHPUnit_Extensions_Selenium2TestCase_URL("http://127.0.0.1:4723/wd/hub/session/".$this->driver->getSessionID());       
        $appiumDriver= new \PHPUnit_Extensions_AppiumTestCase_Driver($seleniumUrl);

        $touchAction= new \PHPUnit_Extensions_AppiumTestCase_TouchAction($seleniumUrl,$appiumDriver);
        $touchAction->press(array('x' => $startX, 'y' => $startY))
            ->wait($duration)
            ->moveTo(array('x' => $endX, 'y' => $endY))
            ->release()
            ->perform();
    }

    /*
    public static void ScollTo(By element)
	{
        System.out.println("Scroll to :"+element);
        org.openqa.selenium.Dimension FrameSize =driver.manage().window().getSize();
		for(int i=0;i<15;i++)
		{
            if (ElementExist(element, 0)) break;
            System.out.println("Scroll: h="+((double)FrameSize.height-50)+"w="+(double)FrameSize.width/2);
            Scroll((double)FrameSize.width/2,(double)FrameSize.height-50, (double)FrameSize.width/3, 5.);
            sleep(500);
        }
	}

    */
}