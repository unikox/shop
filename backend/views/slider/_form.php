<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slider_id')->textInput(); ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'imageFile')->fileInput(); ?>

    <?= $form->field($model, 'item_body')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'filebrowserUploadUrl' => '/slider/upload',
        ],
    ]);
    ?>

    <?= $form->field($model, 'position')->textInput(); ?>

    <?= $form->field($model, 'posted')->CheckBox(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
