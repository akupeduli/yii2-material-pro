<?php

namespace akupeduli\material\helpers;

use akupeduli\material\Material;
use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Layout
{
    /**
     * Retrieves Html options
     * @param string $tag given tag
     * @param array $options
     * @param boolean $asString if return as string
     * @return array|string
     */
    public static function getHtmlOptions($tag, $options = [], $asString = false)
    {
        $callback = sprintf('static::_%sOptions', strtolower($tag));
        
        $htmlOptions = call_user_func($callback, $options);
        
        return $asString ? Html::renderTagAttributes($htmlOptions) : $htmlOptions;
    }
    
    /**
     * Adds body tag options
     * @param array $options given options
     * @return string | array
     */
    private static function _bodyOptions($options)
    {
        Html::addCssClass($options, 'card-no-border');
        
        /** @var Material $metronic */
        $material = Material::getComponent();
        
        if ($material->fixHeader) {
            Html::addCssClass($options, 'fix-header');
        }
        
        if ($material->fixSidebar) {
            Html::addCssClass($options, 'fix-sidebar');
        }
        
        if (is_null($material->sidebarFile) and is_null($material->sidebarConfig)) {
            Html::addCssClass($options, " single-column");
        }
        
        return $options;
    }
}