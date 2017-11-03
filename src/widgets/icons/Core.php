<?php

namespace akupeduli\material\widgets\icons;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Core
{
    private $options = [];
    
    public $prefixCss = "";
    public $defaultTag = "i";
    
    public function __construct($name, $options = [])
    {
        Html::addCssClass($options, $this->prefixCss);

        if (!empty($name)) {
            Html::addCssClass($options, $this->prefixCss . "-" . $name);
        }
        
        $this->options = $options;
    }
    
    public function __toString()
    {
        $options = $this->options;
        $tag = ArrayHelper::remove($options, "tag", $this->defaultTag);
        return Html::tag($tag, null, $options);
    }
    
    public static function icon($name, $options = [])
    {
        $class = get_called_class();
        return new $class($name, $options);
    }
}
