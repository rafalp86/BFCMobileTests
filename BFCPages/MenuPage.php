<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 02.05.2017
 * Time: 05:27
 */

namespace BFCMobileTests\BFCPages;
include('BasePage.php'); //dlaczego ??
include('SettingsPage.php'); //??

class MenuPage extends BasePage
{
     function  GoToSettings()
     {
          $this->tap($this->getSettingsBy()) ;
         return  new SettingsPage($this->driver);

     }

    function IsWorkOrderItemDisplayed() {
        return $this->isDisplayed($this->getWorkOrderBy());
    }

    function IsTimeSheetItemDisplayed() {
        return $this->isDisplayed($this->getSettingsBy());
    }

    function WaitForSynFinish()
    {

    }


    //PAGE ELEMENTS
        private function getWorkOrderBy() {
            return \WebDriverBy::xpath("//*[contains(@content-desc,'Work Order')]");
        }

        protected function getTimeSheetBy() {
            return \WebDriverBy::xpath("//*[@content-desc='Time sheet')]");

        }
    protected function getSettingsBy() {
        return \WebDriverBy::xpath("//*[contains(@content-desc,'Settings')]");

    }

    private static $_selectors = [
        "work_order_el" =>
            [
                "xpath" => "//*[contains(@content-desc,'Work Order')]"
            ],
        "time_sheet_el" =>
            [
                "xpath" => "//*[@content-desc='Time sheet')]"
            ],
        "settings_el" =>
            [
                "xpath" => "//*[contains(@content-desc,'Settings')]"
            ]
    ];

}
