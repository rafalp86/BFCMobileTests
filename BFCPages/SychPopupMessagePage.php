<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 11.05.2017
 * Time: 06:23
 */

namespace BFCMobileTests\BFCPages;


class SychPopupMessagePage extends  BasePage
{

    // Brak identyfikatora do szybkiego zlokalizowanie popupu
    //

//Syncing settings, work orders and static data
//Syncing assets, notes and time sheets
    public  function isPopupMessagePresent()
    {
       return $this->isDisplayed($this->getMessageBy(),1);
    }

    public  function waitForSynchFinish()
    {
        $waitTime=0;
        $maxWaitTime=20;
        while ($this->isPopupMessagePresent() and $waitTime<$maxWaitTime)
        {
            $this->writeToConsole('pop up dale widoczny');
            sleep(1);
            $waitTime++;
        }
    }

    private function getMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[contains(text(),'Syncing')]");
    }

}