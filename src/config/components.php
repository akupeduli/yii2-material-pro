<?php

use akupeduli\material\assets\plugins\DataTableAsset;
use yii\web\View;

return [
    'yii\web\JqueryAsset' => [
        "jsOptions" => [
            "position" => View::POS_HEAD
        ]
    ],
    
    'yii\bootstrap\BootstrapPluginAsset' => [
        "jsOptions" => [
            "position" => View::POS_HEAD
        ]
    ],
    
    'yii\bootstrap\PopperAsset' => [
        "jsOptions" => [
            "position" => View::POS_HEAD
        ]
    ],
    
    'mimicreative\datatables\assets\DataTableAsset' => [
        'class' => DataTableAsset::className()
    ]
];
