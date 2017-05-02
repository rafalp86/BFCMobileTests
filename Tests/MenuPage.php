<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 02.05.2017
 * Time: 05:27
 */

namespace BFCMobileTests\Tests;
include('BasePage.php'); //dlaczego ??

class MenuPage extends BasePage
{
    private static $_selectors = [
        "work_order_el" =>
            [
                "xpath" => "\\*[@contetnt-desc='? Work Order')]"
            ],
        "time_sheet_el" =>
            [
                "xpath" => "\\*[@contetnt-desc='? Time sheet')]"
            ]
    ];

    function IsWorkOrderItemDisplayed() {
    return $this->find(self::$_selectors["work_order_el"])->isDisplayed();
    }
    function IsTimeShhetItemDisplayed() {
        return $this->find(self::$_selectors["work_order_el"])->isDisplayed();
    }
/*
    protected function getWorkOrderBy() {
        return $this->driver->WebDriverBy(\WebDriverBy::xpath("\\*[@contetnt-desc='? Work Order')]"));
    }

    protected function getTimeSheetBy() {
        return $this->driver->WebDriverBy(\WebDriverBy::xpath("\\*[@contetnt-desc='? Time sheet')]"));

    }
*/

}
