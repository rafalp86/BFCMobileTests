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
     function GoToWorkOrder()
     {
         $this->tap($this->getWorkOrderBy());
         return new WorkOrderPage($this->driver);
     }

    function IsWorkOrderItemDisplayed() {

        return $this->isDisplayed($this->getWorkOrderBy(),3);
    }

    function IsTimeSheetItemDisplayed() {
        return $this->isDisplayed($this->getTimeSheetBy(),3);
    }

    function WaitForSynFinish()
    {

    }


    //PAGE ELEMENTS
        private function getWorkOrderBy() {
            return \WebDriverBy::xpath("//*[@content-desc=' Work Order']");
        }

        protected function getTimeSheetBy() {
            return \WebDriverBy::xpath("//*[@content-desc=' Time sheet']");

        }
        protected function getSettingsBy() {
            return \WebDriverBy::xpath("//*[@content-desc=' Settings']");

        }
}
