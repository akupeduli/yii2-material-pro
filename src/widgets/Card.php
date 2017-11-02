<?php

namespace akupeduli\material\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Card extends Widget
{
    const HEADER_TYPE_DEFAULT = "card-outline-default";
    const HEADER_TYPE_INVERSE = "card-outline-inverse";
    const HEADER_TYPE_INFO = "card-outline-info";
    const HEADER_TYPE_PRIMARY = "card-outline-primary";
    const HEADER_TYPE_DANGER = "card-outline-danger";
    const HEADER_TYPE_WARNING = "card-outline-warning";
    const HEADER_TYPE_SUCCESS = "card-outline-success";

    /**
     * @param array
     *  header = [
     *      "type" => self::HEADER_TYPE_INVERSE,
     *      "label" => "Title",
     *  ];
     */
    public $header;
    
    /**
     * @param string 
     */
    public $footer;
    public $options = [];
    
    public function init()
    {
        if ($this->header and !is_array($this->header)) {
            throw new InvalidConfigException("\$header must be array");
        }
        
        $defaultOptions = [ "class" => "card" ];
        $this->options = ArrayHelper::merge($defaultOptions, $this->options);
        echo Html::beginTag("div", $this->options);
        
        if ($this->header) {
            echo $this->_renderHeader();
        }
        
        echo Html::beginTag("div", [ "class" => "card-body" ]);
    }
    
    public function run()
    {
        // close tag card body
        echo Html::endTag("div");
        //close tag card
        echo Html::endTag("div");
    }
    
    public function bodyTitle($title, $options = [])
    {
        $defaultOptions = [ "class" => "card-title" ];
        $tag = ArrayHelper::remove($options, "tag", "h4");
        $options = ArrayHelper::merge($defaultOptions, $options);
        return Html::tag($tag, $title, $options);
    }
    
    public function bodySubtitle($title, $options = [])
    {
        $defaultOptions = [ "class" => "card-subtitle" ];
        $tag = ArrayHelper::remove($options, "tag", "h6");
        $options = ArrayHelper::merge($defaultOptions, $options);
        return Html::tag($tag, $title, $options);
    }
    
    public function bodyText($text, $options = [])
    {
        $defaultOptions = [ "class" => "card-text" ];
        $tag = ArrayHelper::remove($options, "tag", "p");
        $options = ArrayHelper::merge($defaultOptions, $options);
        return Html::tag($tag, $text, $options);
    }
    
    private function _renderHeader()
    {
        $optionsHeader = [ "class" => "card-header" ];
        $title = ArrayHelper::getValue($this->header, "label", null);
        $type = ArrayHelper::getValue($this->header, "type", null);
        Html::addCssClass($optionsHeader, $type);
        
        echo Html::beginTag("div", $optionsHeader);
        
        if (!is_null($type)) {
            $optionsTitle = [ "class" => "m-b-0" ];
            if ($type !== self::HEADER_TYPE_DEFAULT) {
                Html::addCssClass($optionsTitle, "text-white");
            }
            echo Html::tag("h4", $title, $optionsTitle);
        } else {
            echo $title;
        }
        
        echo Html::endTag("div");
    }
}