<?php 

namespace akupeduli\material;

use yii\helpers\ArrayHelper;
use yii\base\BootstrapInterface;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // run this if only the remark component is loaded / defined
        if ($app->has(Material::$componentName)) {
            // setup default params for remark template
            $app->params = ArrayHelper::merge(require(__DIR__ . '/config/params.php'), \Yii::$app->params);

            // override the definitions if any
            \Yii::$container->setDefinitions(require(__DIR__ . '/config/components.php'));
        } else {
            \Yii::info('Component ' . Material::$componentName . ' is not loaded. No need to set the definitions.');
        }
    }
}