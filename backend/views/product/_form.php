<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id1s')->textInput() ?>

    <?= $form->field($model, 'catid1s')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barcode')->textInput() ?>

    <?= $form->field($model, 'shop1sid')->textInput() ?>

    <?= $form->field($model, 'product_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_status')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
