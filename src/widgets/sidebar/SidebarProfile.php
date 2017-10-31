<?php

namespace akupeduli\material\widgets\sidebar;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class SidebarProfile extends Widget
{
    public $background;
    public $photo;
    public $name;
    public $menu;
    public $options = [];
    
    public function run()
    {
        $this->_initOptions();
        echo Html::beginTag("div", $this->options);
        if ($this->photo) {
            echo $this->_renderPhoto();
        }
        if ($this->name) {
            echo Html::beginTag("div", [ "class" => "profile-text" ]);
            echo $this->_renderName();
            if ($this->menu) {
                echo Html::tag("div", $this->_renderItems(), ["class" => "dropdown-menu animated flipInY"]);
            }
            echo Html::endTag("div");
        }
        echo Html::endTag("div");
    }
    
    protected function _renderPhoto()
    {
        $img = Html::img($this->photo);
        return Html::tag("div", $img, [
            "class" => "profile-img"
        ]);
    }
    
    protected function _renderName()
    {
        $options = [];
        if ($this->menu) {
            $options["class"] = "dropdown-toggle u-dropdown";
            $options["data-toggle"] = "dropdown";
        }
        
        return Html::a($this->name, "#", $options);
    }
    
    protected function _renderItems()
    {
        $lines = [];
        foreach ($this->menu as $item) {
            $lines[] = $this->_renderItem($item);
        }
        return implode(PHP_EOL, $lines);
    }
    
    protected function _renderItem($item)
    {
        if ($this->_isMenuDivider($item)) {
            return Html::tag("div", "", ["class" => "dropdown-divider"]);
        }
    
        $options = $item;
        $label = $item["label"];
        
        $options["class"] = ArrayHelper::getValue($item, "class", "dropdown-item");
        $options["href"] = Url::to(ArrayHelper::getValue($options, "url", "#"));
        $options = array_diff_key($options, ["label" => "", "url" => ""]);
        
        return Html::tag("a", $label, $options);
    }
    
    protected function _isMenuDivider($item)
    {
        return isset($item[0]) and $item[0] === "divider";
    }
    
    protected function _initOptions()
    {
        $options = $this->options;
        if (isset($options['style']) and is_string($options['style'])) {
            $options['style'] = [$options['style']];
        }
        
        $defaultOptions = [
            "class" => ["user-profile"],
            "style" => [
                "background-image" => "url({$this->background})",
            ]
        ];
        
        $this->options = ArrayHelper::merge($defaultOptions, $options);
    }
}