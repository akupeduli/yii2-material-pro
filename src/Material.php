<?php

namespace akupeduli\material;

use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Material extends Component
{
    public static $componentName = "material";
    public static $componentVersion = "1.0";
    
    const TEMPLATE_DEFAULT = "material";
    const TEMPLATE_DARK = "dark";
    
    const THEME_DEFAULT = "default";
    const THEME_DEFAULT_DARK = "default-dark";
    const THEME_BLUE = "blue";
    const THEME_BLUE_DARK = "blue-dark";
    const THEME_GREEN = "green";
    const THEME_GREEN_DARK = "green-dark";
    const THEME_MEGNA = "megna";
    const THEME_MEGNA_DARK = "megna-dark";
    const THEME_RED = "red";
    const THEME_RED_DARK = "red-dark";
    const THEME_PURPLE = "purple";
    const THEME_PURPLE_DARK = "purple-dark";
    
    public $assetSourcePath;
    public $assetBundleClass;
    
    public $sidebarConfig;
    public $template = self::TEMPLATE_DEFAULT;
    public $theme = self::THEME_DEFAULT;
    
    public static function getComponent()
    {
        try {
            return \Yii::$app->get(self::$componentName);
        } catch (InvalidConfigException $e) {
            $messageError = 'Component name should be set and named "' . self::$componentName . '".';
            throw new InvalidConfigException($messageError);
        }
    }
    
    public function getAssetPath()
    {
        return $this->assetSourcePath . "/assets";
    }
    
    public function getSourcePath()
    {
        return $this->assetSourcePath . "/" . $this->template;
    }
    
    public function registerAsset($view)
    {
        if ($this->assetSourcePath === null) {
            throw new InvalidConfigException('Please set $assetSourcePath of remark admin template');
        }
        if ($this->assetBundleClass === null) {
            throw new InvalidConfigException('Please set $assetBundleClass property.');
        }
        
        /** @var AssetBundle $assetBundleClass */
        $assetBundleClass = $this->assetBundleClass;
        $assetBundleClass::register($view);
    }
}
