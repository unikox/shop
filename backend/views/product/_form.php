<?php

use app\models\Productimage;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/image-set.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
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
            $cnt = 0;
            foreach ($imgbox as $img) {
                ++$cnt;
                //echo "<img id='image_set".$cnt."' class='fotoitems' src='" . $img['url']."'>";
                echo "<div class='img__control'><img id='image_set' class='fotoitems' src='".$img['url']."'></div>";
            }
            ?>
        </div>
        <form>
            <div class="form-group">
                <label for="ImageFile">Добавить снимок товара</label>
                <input type="file" class="btn btn-success" id="ImageFile">
            </div>
        </form>

</div>

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>



    <?= $form->field($model, 'catid1s')->textInput(); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'barcode')->textInput(); ?>

    <?= $form->field($model, 'shop1sid')->textInput(); ?>

    <?= $form->field($model, 'product_state')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'product_status')->textInput(); ?>

    <?= $form->field($model, 'cost')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить товар', ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
