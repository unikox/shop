<?php
use app\models\catproduct;
use frontend\widgets\siteComponents\pubCatalog;
use frontend\widgets\siteComponents\pubProductList;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\widgets\siteComponents\pubSlider;
use app\models\Slider;
use yii\widgets\DetailView;

$this->registerJsFile(Yii::$app->request->baseUrl.'https://maps.api.2gis.ru/2.0/loader.js?pkg=full',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/2gis.js',['depends' => [\yii\web\JqueryAsset::className()]]);




/* @var $this yii\web\View */

$this->title = 'Комиссионный магазин «MoneyShop24»';
    $cats = new catproduct;
    //var_dump($cats->getparentsCats());
    //var_dump($cats->getCatsItem());
    $parent = json_encode($cats->getparentsCats());
    $items= json_encode($cats->getCatsItem());

$slider = new Slider();
?>
<div class="site-index">



    <div class="body-content">

        <?php
        echo pubCatalog::widget([
            'parents' =>$cats->getparentsCats(),
            'items' =>$cats->getCatsItem()
        ]);
        ?>

            <div class="index_slider">
                <?php
                echo pubSlider::widget([
                    'slider_items' =>$slider -> getSliderItems('General'),

                ]);
                ?>
            </div>
        </div>

    </div>
<?= pubProductList::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_product__item',
    'summary' => false,
    'viewParams' => [
        'fullView' => true,
        'context' => 'main-page',

    ],
]);
?>
    <div class="advantage__box">
        <div class="advantage__header">НАШИ ПРЕИМУЩЕСТВА</div>
        <div class="advantage__body">
            <div class="advantage__first">
                <div class="advantage__item_green">
                    <div class="advantage__image"><img src="uploads/12.png" alt=""></div>
                    <div class="advantage__title">КРУГЛОСУТОЧНАЯ ОЦЕНКА</div>
                    <div class="advantage__text">Адреса наших круглосуточных магазинов, Вы можете посмотреть в разделе контакты.
                        Или уточнить их по телефону. А так же при заполнении карточки "отправить на оценку".
                        Приходите, ждем Вас! Комиссионный магазин работает круглосуточно, только для Вас!</div>
                </div>
                <div class="advantage__item_white">
                    <div class="advantage__image"><img src="uploads/13.png" alt=""></div>
                    <div class="advantage__title">СКУПКА НА ВЫЕЗД</div>
                    <div class="advantage__text">Хотите срочно продать свою технику? А времени или возможности приехать в магазин нет?
                        Мы решили за Вас эту проблему! Теперь сдать технику стало на много проще! Скупка на выезд. Работаем по всему Иркутску.</div>
                    </div>
                <div class="advantage__item_green">
                    <div class="advantage__image"><img src="uploads/14.png" alt=""></div>
                    <div class="advantage__title">СКУПАЕМ ДОРОГО</div>
                    <div class="advantage__text">Желаете выгодно сдать свою технику? Готовы предложить Вам саму высокую цену по скупке в Иркутске!
                        Скупаем дорого: сотовые телефоны, ноутбуки, ТВ и мониторы, электро и бензоинструмент, чайники, утюги, СВЧ, фотоаппараты и многое другое.
                        Оставляйте заявку на оценку!</div>
                    </div>
            </div>
            <div class="advantage__second">
                <div class="advantage__item_white">
                    <div class="advantage__image"><img src="uploads/15.png" alt=""></div>
                    <div class="advantage__title">УДОБНОЕ МЕСТОРАСПОЛОЖЕНИЕ</div>
                    <div class="advantage__text">Для Вашего удобства не только круглосуточная скупка, но и удобное месторасположение.
                        Ведь мы находимся в самом центре города Иркутска.
                        Так же мы не забываем про жителей Ново-Ленино! Теперь и во 2 Иркутске есть круглосуточная скупка!</div>
                    </div>
                <div class="advantage__item_green">
                    <div class="advantage__image"><img src="uploads/16.png" alt=""></div>
                    <div class="advantage__title">С НАМИ ВСЕГДА МОЖНО ДОГОВОРИТЬСЯ О ЦЕНЕ</div>
                    <div class="advantage__text">Наши консультанты всегда готовы идти на встречу клиентам! Сдавайте б\у технику с умом! Проверка и оценка займет не более 15 минут.
                        Деньги получите не отходя от кассы.
                        А если вдруг Вас не устроит конечная цена за сданную технику, то мы всегда можем с Вами решить этот вопрос и найти компромисс.</div>


                    </div>
                <div class="advantage__item_white">
                    <div class="advantage__image"><img src="uploads/17.png" alt=""></div>
                    <div class="advantage__title">СКУПАЕМ ПРАКТИЧЕСКИ ВСЕ</div>
                    <div class="advantage__text">Если нужно продать товар, приносите на оценку свою технику и получайте за нее достойную плату.
                        Скупка бытовой техники ─ это возможность заменить прибор на новый, продать изделие по хорошей цене.</div>


                    </div>
            </div>
        </div>
    </div>
</div>

<div class="map__box">
    <div class="moneyshop24_map">
        <div id="map" style="width:880px; height:300px; bottom:17%"></div>
    </div>
</div>

<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>


<?php /*

        //'id',
        //'created_at',
        //'updated_at',
        'name',
        'id1s',
        //'catid1s',
        //'description:ntext',
        'serial',
        'barcode',
        //'shop1sid',
        'product_state',
        //'product_status',
        //'cost',
 */?>

<script type="text/javascript">
    var parent = <?= $parent?>;
    var item = <?= $items?>;
    console.log(parent);
    console.log(item);
    for()
</script>