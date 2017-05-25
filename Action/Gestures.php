<?php

/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 24.05.2017
 * Time: 06:31
 */
use \BFCMobileTests\BFCPages\BasePage;
class Gestures extends BasePage
{
    public function ScollTo($elementBy)
    {
        $this->writeToConsole("Scroll to: ".$elementBy->getValue());

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