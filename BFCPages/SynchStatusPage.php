<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 18.05.2017
 * Time: 22:38
 */

namespace BFCMobileTests\BFCPages;


class SynchStatusPage extends BasePage
{

    function SyncNow()
    {
        $this->tap($this->getSyncNowButtonBy());
        return new SychPopupMessagePage($this->driver);
    }

    function SyncFile()
    {
        $this->tap($this->getSyncFileButtonBy());
        return new SychPopupMessagePage($this->driver);
    }

    //PAGE ELEMENTS
    private function getSyncNowButtonBy() {
        return \WebDriverBy::xpath("//android.widget.Button[@@content-desc='SYNC NOW ']");

    }
    private function getSyncFileButtonBy() {
        return \WebDriverBy::xpath("//android.widget.Button[@@content-desc='SYNC FILES ']");

    }
}