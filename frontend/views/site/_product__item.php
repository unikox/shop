<?php
/**
 * Created by PhpStorm.
 * User: kox
 * Date: 02.11.2020
 * Time: 5:26
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<div class="product__item">
    <?php

     ?>
    <div class="product_name"><?= Html::encode($model->name) ?></div>

    <?= HtmlPurifier::process( "Состояние:".$model->product_state) ?>
</div>