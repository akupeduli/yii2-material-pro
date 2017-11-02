<?php
use akupeduli\material\assets\core\ImageAsset;

/** @var $this \yii\web\View */
/** @var $exception \yii\web\HttpException */
$media = ImageAsset::register($this);
$this->title = "{$exception->statusCode} - $message";
?>
<section id="wrapper" class="error-page">
    <div class="error-box" style="background: url(<?= $media->baseUrl ?>/background/error-bg.jpg)  no-repeat center center #fff">
        <div class="error-body text-center">
            <h1><?= $exception->statusCode ?></h1>
            <h3 class="text-uppercase"><?= $message ?></h3>
            <p class="text-muted m-t-30 m-b-30">WE ARE TRYING OUR BEST TO SOLVE THIS</p>
            <a href="/" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
        <footer class="footer text-center"><?= Yii::$app->params["material"]["footer"] ?></footer>
    </div>
</section>
