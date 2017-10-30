<?php

namespace akupeduli\material\assets\plugins;

use akupeduli\material\assets\core\PluginAsset;
use yii\web\View;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class JqueryAsset extends PluginAsset
{
    public $pluginName = "jquery";
    public $js = ["jquery.min.js"];
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
}