<?php

use yii\helpers\Html;
use frontend\widgets\siteComponents\pubProductDetails;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="product-view">





    <?= pubProductDetails::widget([
        'model' => $model,
        'images' => $imagelist,
    ]) ;

    ?>


</div>
