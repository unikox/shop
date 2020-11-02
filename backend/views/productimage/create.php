<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productimage */

$this->title = 'Create Productimage';
$this->params['breadcrumbs'][] = ['label' => 'Productimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productimage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
