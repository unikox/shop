<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catproducts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catproduct-index">

    <h1><?= Html::encode($this->title); ?></h1>

    <p>
        <?= Html::a('Create Catproduct', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'id1s',
            'parentid1s',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
