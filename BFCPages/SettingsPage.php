<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 09.05.2017
 * Time: 05:33
 */

namespace BFCMobileTests\BFCPages;
include('BFCPages\SynchStatusPage.php'); //?????

use BFCMobileTests\BFCPages\SychPopupMessagePage;
use BFCMobileTests\BFCPages\SynchStatusPage;

class SettingsPage  extends BasePage
{
    function SychData()
    {
        $allButtons=$this->driver->findElements($this->getButtonsBy());
        end($allButtons)->click();
        return new SychPopupMessagePage($this->driver);
    }

    function GoToSyncStatus()
    {
        $this->tap($this->getSynchStatusMenuItemBy());
        return new SynchStatusPage($this->driver);
    }

    //PAGE ELEMENTS
    private function getButtonsBy() {
        return \WebDriverBy::xpath("//android.widget.Button");

    }
    private function getSynchStatusMenuItemBy()
    {
        return \WebDriverBy::xpath("//android.view.View[@content-desc='Sync status']");
    }
    private function getSynchButtonBy() {
        return \WebDriverBy::xpath("//android.widget.Button[@name=' ']");

    }
}