<?php

namespace akupeduli\material\widgets\icons;

use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class BasicIcon extends Core
{
    public $defaultTag = "div";
    
    public function __construct($name, $options = [])
    {
        $options["data-icon"] = $name;
        Html::addCssClass($options, "linea-icon linea-basic");
        parent::__construct(null, $options);
    }
}
