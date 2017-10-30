<?php

/** @var \yii\web\View $this */
/** @var string $content */

use akupeduli\material\Material;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Material $material */
$material = Material::getComponent();
$material->registerAsset($this);

$this->beginPage();

?>
    
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset; ?>">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        
        <!-- icon -->
        <?php echo Html::csrfMetaTags(); ?>
        <title><?php echo Html::encode($this->title); ?></title>
        
        <!-- js helper -->
        <script type="text/javascript">
            const BASE_URL = '<?= Url::base(true); ?>';
        </script>
        
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php $this->head(); ?>
    </head>
    <body class="fix-header card-no-border">
    <?php $this->beginBody(); ?>
    
    <?php echo $content; ?>
    
    <?php $this->endBody(); ?>
    
    </body>
    </html>

<?php

$this->endPage();
