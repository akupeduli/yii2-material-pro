<?php

namespace akupeduli\material\assets\core;

use akupeduli\material\Material;
use yii\web\AssetBundle;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class ImageAsset extends AssetBundle
{
    public function init()
    {
        $material = Material::getComponent();
        $this->sourcePath = $material->assetPath . "/images";
        parent::init();
    }
}
