<?php
/**
 * Created by PhpStorm.
 * User: Rafał
 * Date: 09.05.2017
 * Time: 05:33
 */

namespace BFCMobileTests\BFCPages;


class SettingsPage  extends BasePage
{
    private static $_selectors = [
        "sync_button_el" =>
            [
                "xpath" => "//android.widget.Button[text()='']"
            ]
    ];

    function SychData()
    {
        return $this->find(self::$_selectors["sync_button_el"])->click();
    }
}