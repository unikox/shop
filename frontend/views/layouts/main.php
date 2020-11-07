<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="header_top">
    <div class="header_contaner">
        <div class="header_item"><a href="#" class="">О moneyshop</a></div>
        <div class="header_item"><a href="#" class="">Каталог</a></div>
        <div class="header_item"><a href="#" class="">Магазины</a></div>
        <div class="header_item"><a href="#" class="">Новости</a></div>
        <div class="header_item_mark"><a href="#" class="">Акции</a></div>
        <div class="header_item"><a href="#" class="">Автомобили</a></div>
        <div class="header_item"><a href="#" class="">Прием золота</a></div>
        <div class="header_item"><a href="#" class="">Вакансии</a></div>
        <div class="header_item_tel"><a href="#" class="">8 964 104 07 60</a></div>
    </div>
</div>
<div class="header">
    <div class="header-group">
        <div class="header-logo"><img src="images/logo.gif" class="headedr_logo" alt=""></div>
        <div class="header-cities">Все города</div>
    </div>
    <div class="header_navbar">
        <div class="header-navbar__item header-navbar__item-favorite"></div>
        <div class="header-navbar__item-label">Избранное</div>
        <div class="header-navbar__item-label">Заказы</div>
        <div class="header-navbar__item-label">Профиль</div>
        <div class="header-navbar__item-label">Корзина</div>
    </div>
</div>
<div class="search">
    <div class="search_container">
            <div class="search_catalog">
                <a href="/catalog/" am-link="catalog" class="search_catalog_show">
                    <span am-icon="menuM_catalogButton"></span>
                    <span>Каталог</span>
                    <span am-icon="menuM_catalogArrow"></span>
                </a>
            </div>
            <div class="search_form">
                    <form class="search_field" method="get">
                            <input type="text" name="ProductSearch[name]="  placeholder="Я хочу купить...">
                        <button class="search_button">Найти</button>
                    </form>
                    <div am-dropdown-content="search" align="left">
                        <div am-dropdown-wrapper="search">
                        </div>
                    </div>

            </div>
    </div>
</div>




<?php $this->beginBody() ?>

<div class="wrap">

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">

    </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
