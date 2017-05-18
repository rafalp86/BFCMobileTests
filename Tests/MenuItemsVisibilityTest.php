<?php
/**
 * Created by PhpStorm.
 */
namespace BFCMobileTests\Tests;
include('InitTestCase.php'); //dlaczego
include('BFCPages\MenuPage.php'); //dlaczego
include('BFCPages\SychPopupMessagePage.php');

use BFCMobileTests\BFCPages\MenuPage;
use BFCMobileTests\BFCPages\SychPopupMessagePage;

class MenuItemsVisibilityTest extends InitTestCase
{
    public function testCheckWorkOrderItemVisibility()
    {
        $menuView = new MenuPage(parent::$static_driver );
        (new SychPopupMessagePage(parent::$static_driver))->waitForSynchFinishSetUpApp();
        $this->assertTrue($menuView ->IsWorkOrderItemDisplayed());
    }

    public function testCheckTimeSheetItemVisibility()
    {
        $menuView = new MenuPage(parent::$static_driver );
        $this->assertTrue($menuView ->IsTimeSheetItemDisplayed());
    }
}