<?php

namespace akupeduli\material\assets;

use yii\web\AssetBundle;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class MaterialAsset extends AssetBundle
{
    public $sourcePath = "@akupeduli/material/web";
    public $js = [
        "js/custom.js"
    ];
    public $css = [
        "css/style.css"
    ];
    public $depends = [
        "akupeduli\\material\\assets\\core\\MainAsset",
        "akupeduli\\material\\assets\\plugins\\StickyKitAsset"
    ];
}