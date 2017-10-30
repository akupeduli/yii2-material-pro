<?php

namespace akupeduli\material\assets\plugins;

use akupeduli\material\assets\core\PluginAsset;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class BootstrapAsset extends PluginAsset
{
    public $pluginName = "bootstrap";
    public $css = [
        "css/bootstrap" . (YII_ENV === YII_ENV_DEV ? "" : ".min") . ".css"
    ];
}