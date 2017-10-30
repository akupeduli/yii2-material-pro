<?php

namespace akupeduli\material\assets\plugins;

use akupeduli\material\assets\core\PluginAsset;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class StickyKitAsset extends PluginAsset
{
    public $pluginName = "sticky-kit-master";
    public $js = [
        "dist/sticky-kit" . (YII_ENV === YII_ENV_DEV ? "" : ".min") . ".js"
    ];
}