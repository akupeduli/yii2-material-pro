<?php

namespace akupeduli\material\assets\core;

use akupeduli\material\Material;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class PluginAsset extends AssetBundle
{
    public $pluginName;
    
    public function __construct(array $config = [])
    {
        if($this->pluginName === null) {
            throw new InvalidConfigException('pluginName must be set.');
        }
        
        $material = Material::getComponent();
        $this->sourcePath = $material->assetPath . '/plugins/' . $this->pluginName;
        
        parent::__construct($config);
    }
}