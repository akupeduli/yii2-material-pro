<?php

namespace akupeduli\material\assets\core;

use akupeduli\material\Material;
use yii\web\AssetBundle;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class MainAsset extends AssetBundle
{
    public $publishOptions = [
        "except" => [
            "*.html", "*.scss", "*.cfg", "*.config",
            "*.less"
        ]
    ];
    
    public $css = [
        "css/style.css"
    ];
    
    public $js = [
        "js/jquery.slimscroll.js",
        "js/waves.js",
        "js/sidebarmenu.js"
    ];
    
    public $depends = [
        "yii\\web\\JqueryAsset",
        "yii\\bootstrap\\BootstrapAsset",
        "yii\\bootstrap\\BootstrapPluginAsset",
    ];
    
    public function init()
    {
        $material = Material::getComponent();
        $this->sourcePath = $material->sourcePath;
        $this->css[] = "css/colors/{$material->theme}.css";
        parent::init();
    }
}