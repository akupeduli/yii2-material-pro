<?php
namespace akupeduli\material\actions;
use Yii;
use yii\base\Exception;
use yii\web\HttpException;
use yii\base\UserException;
use yii\web\ErrorAction as Base;
class ErrorAction extends base
{
    public $view = "@akupeduli/material/views/error";
    public function run()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
            $exception = new HttpException(404, Yii::t('yii', 'Page not found.'));
        }
        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }
        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName ?: Yii::t('yii', 'Error');
        }
        if ($code) {
            $name .= " (#$code)";
        }
        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = $this->defaultMessage ?: Yii::t('yii', 'An internal server error occurred.');
        }
        if (Yii::$app->getRequest()->getIsAjax()) {
            return "$name: $message";
        } else {
            $this->controller->layout = "@akupeduli/material/views/layouts/base";
            return $this->controller->render($this->view, [
                'name' => $name,
                'message' => $message,
                'exception' => $exception,
            ]);
        }
    }
}