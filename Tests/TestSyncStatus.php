<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 09.05.2017
 * Time: 05:41
 */

namespace BFCMobileTests\Tests;
include('InitTestCase.php'); //dlaczego
include('BFCPages\MenuPage.php'); //dlaczego
include('BFCPages\SychPopupMessagePage.php');

use BFCMobileTests\BFCPages\MenuPage;
use BFCMobileTests\BFCPages\SettingsPage;
use BFCMobileTests\BFCPages\SychPopupMessagePage;

class TestSyncStatus extends  InitTestCase
{
    public function testSyncStatusInSettingsView()
    {
        $menuView = new MenuPage(parent::$static_driver );
        $popUpView= new SychPopupMessagePage(parent::$static_driver);
        $popUpView->waitForSynchFinishSetUpApp();
        $settingsView=$menuView->GoToSettings();
        $synchView=$settingsView->SychData();
        $this->assertTrue($synchView->waitForSynchFinish());
    }

}