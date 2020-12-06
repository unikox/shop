<?php

namespace frontend\widgets\siteComponents;

use yii\base\Widget;
use yii\bootstrap\Carousel;

//$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

class pubSlider extends Widget
{
    public $slider_items;

    public function init()
    {
        parent::init();

        if ($this->slider_items === null) {
            $this->slider_items = 'Слайдер не настроен';
        }
    }

    public function run()
    {
        $ITM = [];
        foreach ($this->slider_items as $sitems) {
            //$content_item = ['content' => '<img src="'. $sitems['url'] .' "/>'];
            $content_item = [
               'content' => '<img class="slider_image" src="'.$sitems['url'].' "/>',
               'caption' => '<div class="slider_text_container">'.$sitems['item_body'].'</div>',
               //'caption' => '<div class="slider_text_container">' .'<h1>Заголовок</h1><p>Какой-то дополнительный текст</p><p><a href="/article/link/1" class="btn btn-primary">Подробнее <span class="glyphicon glyphicon-chevron-right"></a></p></div>',
           ];
            //$caption_item =['caption' => "<div class='slider_text_container'>".$sitems['item_body']."</div>",];

            array_push($ITM, $content_item);
            //array_push($ITM, $caption_item);
        }

        echo Carousel::widget([
            'items' => $ITM,
            'options' => ['class' => 'carousel2 slide', 'data-interval' => '12000'],

            'controls' => [
                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>',
            ],
            ]);
    }
}
