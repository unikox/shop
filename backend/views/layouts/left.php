<?php
use yii\helpers\Url;
?>
<aside class="main-sidebar ">

    <section class="sidebar">


        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree ', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Настройки портала:', 'options' => ['class' => 'header']],

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Магазин',
                        'icon' => 'shopping-cart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Менеджер точек продаж', 'icon' => 'file-code-o', 'url' => ['/shops'],],
                            ['label' => 'Категории товара', 'icon' => 'dashboard', 'url' => Url::to('index.php?r=catproduct'),],
                            ['label' => 'Товары', 'shopping-bag' => 'dashboard', 'url' => Url::to('index.php?r=product'),],
                            ['label' => 'Заказы', 'icon' => 'shopping-cart', 'url' => Url::to('index.php?r=product'),],

                        ],
                    ],
                    [

                        'label' => 'Контент',
                        'icon' => 'gears',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Cладер Менеджер', 'icon' => 'file-code-o', 'url' => ['/slider'],],
                            ['label' => 'Разделы меню', 'icon' => 'file-code-o', 'url' => ['/articles'],],
                            ['label' => 'Менеджер страниц', 'icon' => 'file-code-o', 'url' => ['/pages'],],
                            ['label' => 'Менеджер изображений', 'icon' => 'file-code-o', 'url' => ['/productimage'],],


                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
