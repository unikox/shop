<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Productimage;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>

<?php
    $img = new Productimage();
    $imgbox = $img->getImagesList($model->id);
?>
<div class="product-form">



    <div class="fotobox">
        <div class="fotobox_title">
            <h3>Снимки товара:</h3>
        </div>
        <div class="foto_contaier">
            <?php
            foreach ($imgbox as $img){
                echo "<img class='fotoitems' src='" . $img['url']."'>";
            }
            ?>
        </div>

        <?= Html::Button('Добавить снимок товара', ['class' => 'btn btn-success']) ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'catid1s')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barcode')->textInput() ?>

    <?= $form->field($model, 'shop1sid')->textInput() ?>

    <?= $form->field($model, 'product_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_status')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить товар', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
