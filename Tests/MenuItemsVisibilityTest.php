<?php
/**
 * Created by PhpStorm.
 */
namespace BFCMobileTests\Tests;
include('InitTestCase.php'); //dlaczego
include('BFCPages\MenuPage.php'); //dlaczego
use BFCMobileTests\BFCPages\MenuPage;

class MenuItemsVisibilityTest extends InitTestCase
{
    public function testCheckWorkOrderItemVisibility()
    {
        $menuView = new MenuPage(parent::$static_driver );
        $this->assertTrue($menuView ->IsWorkOrderItemDisplayed());
    }

    public function testCheckTimeSheetItemVisibility()
    {
        $menuView = new MenuPage(parent::$static_driver );
        $this->assertTrue($menuView ->IsTimeSheetItemDisplayed());
    }
}