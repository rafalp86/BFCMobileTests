<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 09.05.2017
 * Time: 05:33
 */

namespace BFCMobileTests\BFCPages;

use BFCMobileTests\BFCPages\SychPopupMessagePage;

class SettingsPage  extends BasePage
{
    private static $_selectors = [
        "sync_button_el" =>
            [
                "xpath" => "//android.widget.Button[text()='']"
            ]
    ];

    function SychData()
    {
        $allButtons=$this->driver->findElements($this->getButtonsBy());
        end($allButtons)->click();
        /*
        foreach ($allButtons as $button )
        {
            $name=$button->getAttribute('name');
            $this->writeToConsole('-'.$name.'-');
        }
        $this->tap($this->getSynchButtonBy());
        */
        return new SychPopupMessagePage($this->driver);
    }
    //PAGE ELEMENTS
    private function getButtonsBy() {
        return \WebDriverBy::xpath("//android.widget.Button");

    }
    private function getSynchButtonBy() {
        return \WebDriverBy::xpath("//android.widget.Button[@name=' ']");

    }
}