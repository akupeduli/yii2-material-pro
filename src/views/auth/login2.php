<?php
use akupeduli\material\assets\core\ImageAsset;
use akupeduli\material\forms\LoginForm;
use yii\base\InvalidConfigException;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$media = ImageAsset::register($this);
if (!isset($loginForm)) {
    throw new InvalidConfigException("\$loginForm is required");
}
if (!($loginForm instanceof LoginForm) and !is_subclass_of($loginForm, LoginForm::className())) {
    throw new InvalidConfigException("\$loginForm must extends from " . LoginForm::className());
}
?>
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<section id="wrapper" class="login-register login-sidebar"  style="background-image:url(<?= $media->baseUrl ?>/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">
            <?php
                $form = ActiveForm::begin([
                    "errorCssClass" => "has-danger",
                    "options" => [
                        "id" => "loginForm",
                        "class" => "form-horizontal form-material"
                    ],
                    "fieldConfig" => [
                        "template" => "{input}\n{error}",
                        "inputOptions" => [
                            "class" => "form-control"
                        ],
                        "errorOptions" => [
                            "class" => "form-control-feedback"
                        ]
                    ],
                ]);
            ?>
                <a href="javascript:void(0)" class="text-center db">
                    <img src="<?= $media->baseUrl ?>/logo-icon.png" alt="Home" /><br/>
                    <img src="<?= $media->baseUrl ?>/logo-text.png" alt="Home" />
                </a>
                <?php
                    if ($loginForm->loginWith === LoginForm::WITH_USERNAME) {
                        echo $form->field($loginForm, "username", [
                            "options" => [
                                "class" => "form-group m-t-40"
                            ],
                            "inputOptions" => [
                                "placeholder" => $loginForm->getAttributeLabel("username")
                            ]
                        ]);
                    } else if ($loginForm->loginWith === LoginForm::WITH_EMAIL) {
                        echo $form->field($loginForm, "email", [
                            "options" => [
                                "class" => "form-group m-t-40"
                            ],
                            "inputOptions" => [
                                "placeholder" => $loginForm->getAttributeLabel("email")
                            ]
                        ]);
                    }
            
                    echo $form->field($loginForm, "password", [
                        "inputOptions" => [
                            "placeholder" => $loginForm->getAttributeLabel("password")
                        ]
                    ])->passwordInput();
                ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" name="<?= $loginForm->formName() . "[rememberMe]" ?>" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <?php if (!is_null($loginForm->forgotPasswordUrl)): ?>
                            <a href="<?= Url::to($loginForm->forgotPasswordUrl) ?>" id="to-recover" class="text-dark pull-right">
                                <i class="fa fa-lock m-r-5"></i> Forgot pwd?
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <?php if (!is_null($loginForm->registerUrl)): ?>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>
                                Don't have an account?
                                <a href="<?= Url::to($loginForm->registerUrl) ?>" class="text-info m-l-5">
                                    <b>Sign Up</b>
                                </a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</section>