<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id'); ?>

    <?= $form->field($model, 'created_at'); ?>

    <?= $form->field($model, 'updated_at'); ?>

    <?= $form->field($model, 'name'); ?>

    <?= $form->field($model, 'id1s'); ?>

    <?php // echo $form->field($model, 'catid1s')?>

    <?php // echo $form->field($model, 'description')?>

    <?php // echo $form->field($model, 'serial')?>

    <?php // echo $form->field($model, 'barcode')?>

    <?php // echo $form->field($model, 'shop1sid')?>

    <?php // echo $form->field($model, 'product_state')?>

    <?php // echo $form->field($model, 'product_status')?>

    <?php // echo $form->field($model, 'cost')?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']); ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
