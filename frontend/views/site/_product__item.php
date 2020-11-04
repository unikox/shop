<?php
/**
 * Created by PhpStorm.
 * User: kox
 * Date: 02.11.2020
 * Time: 5:26
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use app\models\Productimage;
?>
<?

?>
<div class="product__item">


<?php

    ?>
<?php
$img = new Productimage();
$imgbox = $img->getImagesList($model->id);
    echo "<div class='product_list_image'>";

    foreach ($imgbox as $img){
        echo "<img  class='product_list_image_item' src='" . $img['url']."'>";
    }
    echo "</div>";
if($model->product_state){
   // echo "Состояние: ".$model->product_state;
}
?>

<div class="product_name"><?= Html::encode($model->name) ?></div>
    <?php if($model->cost >0){?>
        <div class="product_cost_box"><div class="product_cost"><?= Html::encode($model->cost) ?></div><div class="product_valute">Руб.</div></div>
    <?php } ?>
    <?= Html::a('Подробнее', ['/product/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

</div>
