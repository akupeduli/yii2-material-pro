Yii2 Material Admin Template Integration
========================================
I don't have any words for this :D

Basic Setting
=============

```php
<?php
use akupeduli\material\Material;
use akupeduli\material\assets\MaterialAsset;

return [
    "components" => [
        Material::$componentName => [
            'class'            => Material::className(),
            'assetSourcePath'  => '@common/../../material-pro',
            'assetBundleClass' => MaterialAsset::className(),
            /** if sidebarConfig is string, will read as path file **/
            'sidebarConfig'    => "@akupeduli/material/config/sidebar.php",
            'navbarFile'       => "@akupeduli/material/views/samples/navbar"
        ],
    ],
]
```