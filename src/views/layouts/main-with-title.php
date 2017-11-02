<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use akupeduli\material\widgets\Breadcrumbs;

$this->beginContent(__DIR__ . "/main-core.php") ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <?php
                $title = ArrayHelper::getValue($this->params, "pageTitle", $this->title);
                echo Html::tag("h3", $title, [ "class" => "text-themecolor m-b-0 m-t-0" ]);
                $breadcrumbs = ArrayHelper::getValue($this->params, "breadcrumbs", null);
                if (!is_null($breadcrumbs)) {
                    echo Breadcrumbs::widget([ "links" => $breadcrumbs ]);
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $content ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
