<?php $this->beginContent(__DIR__ . "/main-core.php") ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $content ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
