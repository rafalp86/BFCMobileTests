<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 02.05.2017
 * Time: 06:04
 */
namespace BFCMobileTests\Tests;
require_once 'vendor/autoload.php';
include('InitTestCase.php'); //dlaczego
include('MenuPage.php'); //dlaczego

class MenuItemsVisibilityTest extends InitTestCase
{
    public function testCheckWorkOrderVisibility()
    {
        $menuView = new MenuPage(parent::$static_driver );
        $this->assertTrue($menuView ->IsWorkOrderItemDisplayed());
    }

    public function CheckWorkOrderVisibility2()
    {
        $menuView = new MenuPage(parent::$driver );
        echo 'CheckWorkOrderVisibility';
        $this->assertTrue($menuView ->IsWorkOrderItemDisplayed());
    }
}