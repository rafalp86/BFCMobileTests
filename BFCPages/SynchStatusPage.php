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
    protected  $UiAction;
        
    public function __construct(\RemoteWebDriver $driver)
    {
        $this->UiAction =new \Gestures($driver);
        parent::__construct($driver);
        }
    
    public function GetAssetsTime()
    {
         $this->UiAction->ScollTo($this->getAssetsSynchLabel(),TRUE);
         //$this->getTextFromAllElemets();
         return $this->getText($this->getAssetsSynchTime());
    }
    function SyncNow()
    {
        $this->UiAction->ScollTo($this->getSettingsBy());
        $this->tap($this->getSyncNowButtonBy());
        return new SychPopupMessagePage($this->driver);
    }

    function SyncFile()
    {
        $this->UiAction->ScollTo($this->getSettingsBy());
        $this->tap($this->getSyncFileButtonBy());       
        return new SychPopupMessagePage($this->driver);
    }

    //PAGE ELEMENTS
    private function getSyncNowButtonBy() {
        return \WebDriverBy::xpath("//android.widget.Button[@content-desc='SYNC NOW ']");

    }
    private function getSyncFileButtonBy() {
        return \WebDriverBy::xpath("//android.widget.Button[@content-desc='SYNC FILES ']");
    }
    
    private function  getAssetsSynchLabel(){
         return \WebDriverBy::xpath("//android.view.View[@content-desc='assets']");
    }   
    
     private function  getAssetsSynchTime(){
         return \WebDriverBy::xpath("//android.view.View[@content-desc='assets']]/following-sibling::android.view.View");
    } 
            
}