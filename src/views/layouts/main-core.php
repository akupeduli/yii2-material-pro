<?php

use akupeduli\material\assets\core\ImageAsset;
use akupeduli\material\Material;
use akupeduli\material\widgets\Sidebar;

$this->beginContent(__DIR__ . '/base.php');
$image = ImageAsset::register($this);
$material = Material::getComponent();
$material->sidebarConfig = require(Yii::getAlias("@akupeduli/material/config/sidebar.php"));
$material->navbarFile = "@akupeduli/material/views/samples/navbar";
?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php
            if ($material->navbarFile) {
                echo $this->render($material->navbarFile);
            }
            if ($material->sidebarConfig and is_null($material->sidebarFile)) {
                echo Sidebar::widget($material->sidebarConfig);
            } else if ($material->sidebarFile) {
                echo $this->render($material->sidebarFile);
            }
        ?>
        <div class="page-wrapper">
            <?= $content ?>
            <footer class="footer">
                <?= Yii::$app->params["material"]["footer"] ?>
            </footer>
        </div>
    </div>
<?php
$this->endContent();
