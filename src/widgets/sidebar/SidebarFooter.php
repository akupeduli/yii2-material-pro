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
class SidebarFooter extends Widget
{
    public $menu;
    public $menuTemplate = '<a {attr}>{label}</a>';
    public $options = [];
    
    public function run()
    {
        $this->_initOptions();
        echo Html::tag("div", $this->renderItems(), $this->options);
    }
    
    protected function renderItems()
    {
        $lines = [];
        foreach ($this->menu as $item) {
            $lines[] = $this->renderItem($item);
        }
        
        return implode(PHP_EOL, $lines);
    }
    
    protected function renderItem($item) {
        return strtr($this->menuTemplate, [
            "{label}" => $item['label'],
            "{attr}" => $this->_formatItemAttr($item)
        ]);
    }
    
    private function _formatItemAttr($item)
    {
        $options = [
            'class' => 'link',
            'href'  => ArrayHelper::getValue($item, 'url', '#')
        ];
        
        $options["href"] = Url::to($options["href"]);
        if (isset($item['options'])) {
            $options = ArrayHelper::merge($options, $item["options"]);
        }
        
        return Html::renderTagAttributes($options);
    }
    
    protected function _initOptions()
    {
        $options = $this->options;
        $defaultOptions = [
            "class" => ["sidebar-footer"]
        ];
        
        $this->options = ArrayHelper::merge($defaultOptions, $options);
    }
}