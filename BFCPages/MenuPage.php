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
include('Action\Gestures.php'); //??

class MenuPage extends BasePage
{
     function  GoToSettings()
     {
         $this->openMenu();
         $this->tap($this->getSettingsBy()) ;
         return  new SettingsPage($this->driver);

     }
     function GoToWorkOrder()
     {
         $this->openMenu();
         $this->tap($this->getWorkOrderBy());
         return new WorkOrderPage($this->driver);
     }

    function IsWorkOrderItemDisplayed() {
        $this->openMenu();
        return $this->isDisplayed($this->getWorkOrderBy(),3);
    }

    function IsTimeSheetItemDisplayed() {
        return $this->isDisplayed($this->getTimeSheetBy(),3);
    }

    private function openMenu()
    {
       if($this->isDisplayed($this->getTopMenuBy()))
           $this->tap($this->getTopMenuBy());
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
        protected function getTopMenuBy() {
            return \WebDriverBy::xpath("//android.widget.Button[@content-desc='Menu ']");

        }
}
