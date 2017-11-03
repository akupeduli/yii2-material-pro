<?php

namespace akupeduli\material\widgets;

use yii\bootstrap\Widget;
use yii\bootstrap\Alert;
use yii\helpers\Html;

/**
 * Alert widget renders a message from session flash for AdminLTE alerts. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', '<b>Alert!</b> Danger alert preview. This alert is dismissable.');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Evgeniy Tkachenko <et.coder@gmail.com>
 */
class FlashAlert extends Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the array:
     *       - class of alert type (i.e. danger, success, info, warning)
     *       - icon for alert AdminLTE
     */
    public $alertTypes = [
        'error' => [
            'class' => 'alert-danger',
            'headClass' => 'text-danger',
            'icon' => '<i class="fa fa-times-circle"></i>',
        ],
        'danger' => [
            'class' => 'alert-danger',
            'headClass' => 'text-danger',
            'icon' => '<i class="fa fa-times-circle"></i>',
        ],
        'success' => [
            'class' => 'alert-success',
            'headClass' => 'text-success',
            'icon' => '<i class="fa fa-check-circle"></i>',
        ],
        'info' => [
            'class' => 'alert-info',
            'headClass' => 'text-info',
            'icon' => '<i class="fa fa-info-circle"></i>',
        ],
        'warning' => [
            'class' => 'alert-warning',
            'headClass' => 'text-warning',
            'icon' => '<i class="fa fa-exclamation-circle"></i>',
        ],
    ];
    
    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];
    
    
    /**
     * @var boolean whether to removed flash messages during AJAX requests
     */
    public $isAjaxRemoveFlash = true;
    
    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
    
        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        
        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $message) {
                    $options = $this->options;
                    $alertData = $this->alertTypes[$type];
                    $options['id'] = $this->getId() . '-' . $type;
                    Html::addCssClass($options, [$alertData['class'], "alert-rounded"]);
                    
                    echo Alert::widget([
                        'body' => $alertData['icon'] . " " . $message,
                        'closeButton' => $this->closeButton,
                        'options' => $options,
                    ]);
                }
                if ($this->isAjaxRemoveFlash && !\Yii::$app->request->isAjax) {
                    $session->removeFlash($type);
                }
            }
        }
    }
}
