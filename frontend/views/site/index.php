<?php
use app\models\catproduct;
use frontend\widgets\siteComponents\pubCatalog;
use frontend\widgets\siteComponents\pubSlider;
use app\models\Slider;
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
</div>

<script type="text/javascript">
    var parent = <?= $parent?>;
    var item = <?= $items?>;
    console.log(parent);
    console.log(item);
    for()
</script>