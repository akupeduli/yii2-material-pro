<?php

namespace akupeduli\material\widgets\sidebar;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class SidebarMenu extends Menu
{
    public $activateParents = true;
    public $headingClass = "nav-small-cap";
    public $dividerClass = "nav-devider";
    public $linkTemplate = "<a {attr}>{icon}{label}</a>";
    public $submenuTemplate = "\n<ul class='collapse'>\n{items}\n</ul>\n";
    
    public function init()
    {
        $this->_initOption();
    }
    
    public function run()
    {
        echo Html::beginTag("nav", [ "class" => "sidebar-nav" ]);
        parent::run();
        echo Html::endTag("nav");
    }
    
    protected function renderItems($items, $level = 1)
    {
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $item["level"] = $level;
            $class = [];

            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            
            if ($item["active"] and $item["level"] == 1) {
                $class[] = $this->activeCssClass;
            }
            
            if ($this->_isHeading($item)) {
                $class[] = $this->headingClass;
            }
    
            if ($this->_isDivider($item)) {
                $class[] = $this->dividerClass;
            }
            
            if (!empty($class)) {
                Html::addCssClass($options, implode(' ', $class));
            }
        
            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $menu .= strtr($this->submenuTemplate, [
                    '{items}' => $this->renderItems($item['items'], $level + 1),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }
    
        return implode("\n", $lines);
    }
    
    protected function renderItem($item)
    {
        if ($this->_isHeading($item)) {
            $template = ArrayHelper::getValue($item, "template", $this->labelTemplate);
            return strtr($template, [
                "{label}" => ArrayHelper::getValue($item, "label", "")
            ]);
        }
        
        if ($this->_isDivider($item)) {
            return "";
        }
    
        $template = ArrayHelper::getValue($item, "template", $this->linkTemplate);
        $label = ArrayHelper::remove($item, "label", "");
        $icon = ArrayHelper::remove($item, "icon", "");
        if ($item["level"] == 1) {
            $label = Html::tag("span", $label, [ "class" => "hide-menu" ]);
        }
        
        return strtr($template, [
            "{attr}" => $this->_formatLinkAttr($item),
            "{icon}" => $icon,
            "{label}" => $label
        ]);
    }
    
    private function _isHeading($item)
    {
        return (
            $item['level'] === 1 and
            !empty(ArrayHelper::getValue($item, "label", null)) and
            empty(ArrayHelper::getValue($item, 'url', null)) and
            empty(ArrayHelper::getValue($item, 'items', null))
        );
    }
    
    private function _isDivider($item)
    {
        $label = ArrayHelper::getValue($item, "label", null);
        return $label === "divider";
    }
    
    private function _formatLinkAttr($item)
    {
        $options = [
            "class" => "",
            "aria-expanded" => false,
            "href" => ArrayHelper::remove($item, "url", "#"),
        ];
        
        if ($item["active"] and $item["level"] > 1) {
            Html::addCssClass($options, $this->activeCssClass);
        }
        
        if ($item["level"] == 1) {
            Html::addCssClass($options, "waves-effect waves-dark");
        }
        
        if (isset($item["class"])) {
            Html::addCssClass($options, $item["class"]);
        }
    
        if (!empty($item['items'])) {
            Html::addCssClass($options, "has-arrow");
            $options['href'] = 'javascript:void(0);';
        } else {
            $options['href'] = Url::to($options['href']);
        }
    
        return Html::renderTagAttributes($options);
    }
    
    protected function _initOption()
    {
        $options = $this->options;
        $defaultOptions = [
            "id" => "sidebarnav"
        ];
    
        $this->options = ArrayHelper::merge($defaultOptions, $options);
    }
}
