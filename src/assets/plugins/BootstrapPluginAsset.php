<?php

namespace akupeduli\material\assets\plugins;

use akupeduli\material\assets\core\PluginAsset;
use yii\web\View;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class BootstrapPluginAsset extends PluginAsset
{
    public $pluginName = "bootstrap";
    public $js = [
        "js/popper.min.js",
        "js/bootstrap" . (YII_ENV === YII_ENV_DEV ? "" : ".min") . ".js"
    ];
    public $jsOptions = [
        "position" => View::POS_HEAD
    ];
}