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
        $isD= $this->isDisplayed($this->getMessageBy(),1);
        $this->writeToConsole($isD);
       return $isD;
    }

    public function isErrorMessagePresent()
    {
       return $this->isDisplayed($this->getErrorMessageBy(),1);
    }

    public  function waitForSynchFinishSetUpApp()
    {
        if($this->isErrorMessagePresent())
            return false;

        $this->findElement($this->getSyncingStaticMessageBy());
        $this->findElement($this->getSyncingQuotesMessageBy());
        $this->findElement($this->getUploadingDatabaseMessageBy());
        $this->waitForElementDisappear($this->getUploadingDatabaseMessageBy());

        if($this->isErrorMessagePresent())
            return false;
        return true;
    }
    public function waitForSynchFinish()
    {
        if($this->isErrorMessagePresent())
            return false;

        $this->findElement($this->getSyncingSettingsMessageBy());
        $this->findElement($this->getSyncingAssetsMessageBy());
        $this->findElement($this->getSyncingQuotesMessageBy());

        if($this->isErrorMessagePresent())
            return false;
        return true;
    }

    private function getSyncingSettingsMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[contains(@content-desc,'Syncing settings')]");
    }
    private function getSyncingAssetsMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[contains(@content-desc,'Syncing assets')]");
    }

    private function getSyncingStaticMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[contains(@content-desc,'Syncing statics')]");
    }

    private function getSyncingQuotesMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[contains(@content-desc,'Syncing quotes')]");
    }
    private function getUploadingDatabaseMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[contains(@content-desc,'Uploading database')]");
    }

    private function getErrorMessageBy()
    {
        // zmienić na indentyfikacje po ID
        return \WebDriverBy::xpath("//android.view.View[@content-desc='Error']");
    }


}