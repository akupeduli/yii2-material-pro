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
    public $css = [
        "jquery.dataTables.min.css"
    ];
    public $js = [
        "jquery.dataTables.min.js",
        "dataTables.bootstrap.js"
    ];
    public $depends = [
        "yii\\web\\JqueryAsset",
        "yii\\bootstrap\\BootstrapAsset",
        "yii\\bootstrap\\BootstrapPluginAsset",
    ];
}