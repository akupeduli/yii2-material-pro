<?php

namespace akupeduli\material\widgets;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $tag = "ol";
    public $itemTemplate = "<li class='breadcrumb-item'>{link}</li>\n";
    public $activeItemTemplate = "<li class='breadcrumb-item active'>{link}</li>\n";
}