<?php

namespace akupeduli\material\assets\plugins;

use akupeduli\material\assets\core\PluginAsset;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class DataTableAsset extends PluginAsset
{
    public $pluginName = "datatables";
    public $js = [
        "jquery.dataTables.min.js"
    ];
    public $depends = [
        "yii\\web\\JqueryAsset",
        "yii\\bootstrap\\BootstrapAsset",
        "yii\\bootstrap\\BootstrapPluginAsset",
    ];
}