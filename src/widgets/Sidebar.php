<?php

namespace akupeduli\material\widgets;

use akupeduli\material\widgets\sidebar\SidebarFooter;
use akupeduli\material\widgets\sidebar\SidebarMenu;
use akupeduli\material\widgets\sidebar\SidebarProfile;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Sidebar extends Widget
{
    public $footer;
    public $menu;
    public $profile;

    public function run()
    {
        $optionAside = [
            "class" => ["left-sidebar"]
        ];
        
        if (is_null($this->footer)) {
            $optionAside["class"][] = "no-footer";
        }
        
        echo Html::beginTag("aside", $optionAside);
        if (!is_null($this->profile) or !is_null($this->menu)) {
            echo Html::beginTag("div", [
                "class" => "scroll-sidebar"
            ]);
            
            if (!is_null($this->profile)) {
                echo SidebarProfile::widget($this->profile);
            }
            
            if (!is_null($this->menu)) {
                echo SidebarMenu::widget($this->menu);
            }
            
            echo Html::endTag("div");
        }
        if (!is_null($this->footer)) {
            echo SidebarFooter::widget($this->footer);
        }
        echo Html::endTag("aside");
    }
}
