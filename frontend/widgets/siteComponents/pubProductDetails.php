<?php


namespace frontend\widgets\siteComponents;

use Yii;
use yii\base\Arrayable;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\i18n\Formatter;
use yii\bootstrap\Carousel;


class pubProductDetails extends Widget
{

    public $model;
    public $images;
    protected $ITM = array();


    public function init()
    {
        parent::init();

        foreach ($this->images as $sitems) {

            $content_item = [
                'content' => '<img class="product_slider_image" src="' . $sitems['url'] . ' "/>',

            ];
            array_push($this->ITM, $content_item);
        };
    }


    public function run()
    {
        echo "<div class='product__box'>";
            echo "<div class='product__name'>";
                echo $this->model->name;
            echo "</div>";
            echo "<div class='product__container'>";
                echo "<div class='product__slider_box'>";
                    echo "<div class='product__slider'>";
                        echo Carousel::widget([
                            'items' => $this->ITM,
                            'options' => ['class' => 'carousel2 slide', 'data-interval' => '12000'],

                            'controls' => [
                                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                            ]
                        ]);
                    echo "</div>";
                    echo "<div class='product__description'>";
                        echo "<div class='product__description_item'>";
                            echo "<div class='product__description_caption'>Описание"."</div>";
                            echo "<div class='product__description_body'>" . $this->model->description . "</div>";
                        echo "</div>";
                        echo "<div class='product__description_item'>";
                            echo "<div class='product__description_caption'>Состояние"."</div>";
                            echo "<div class='product__description_body'>" . $this->model->product_state . "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='product__price_box'>";
                    echo "<div class='product__price_container'>";
                        echo "<div class='product__cost_box'>";
                            echo '<div class="product__cost_caption">Цена:</div>';
                            echo '<div class="product__cost_summ">' . $this->model->cost .' Руб</div>';
                        echo "</div>";
                        echo "<button class='product__price_botton_buy' id='".$this->model->id."'>Купить</button>";
                        echo "<button class='product__price_botton_bundle' id='".$this->model->id."'>Забронировать</button>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";

        echo "</div";


    }


}
