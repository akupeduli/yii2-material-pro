<?php

use akupeduli\material\assets\plugins\BootstrapAsset;
use akupeduli\material\assets\plugins\BootstrapPluginAsset;
use akupeduli\material\assets\plugins\DataTableAsset;
use akupeduli\material\assets\plugins\JqueryAsset;

return [
    'yii\web\JqueryAsset' => [
        'class' => JqueryAsset::className(),
    ],
    
    'yii\bootstrap\BootstrapAsset' => [
        'class' => BootstrapAsset::className(),
    ],
    
    'yii\bootstrap\BootstrapPluginAsset' => [
        'class' => BootstrapPluginAsset::className(),
    ],
    
    'mimicreative\datatables\assets\DataTableAsset' => [
        'class' => DataTableAsset::className()
    ]
];
