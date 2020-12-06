<?php

namespace frontend\widgets\siteComponents;

use yii\base\Widget;

class pubCatalog extends Widget
{
    public $parents;
    public $items;

    private $start;
    private $startItem;
    private $startCatalog;
    private $stop;
    private $stopItem;
    private $stopCatalog;
    private $article;
    private $article_parent_name;
    private $article_parent_id1s;
    private $article_name;
    private $article_id1s;

    public function init()
    {
        parent::init();

        if ($this->parents === null) {
            $this->parents = 'безимянный раздел';
        }

        if ($this->items === null) {
            $this->items = 'безимянный подраздел';
        }

        $this->start = "<div class='item_box'> ";
        $this->startCatalog = "<div class='index_catalog'>";
        $this->startItem = "<div class='index_catalog'>";

        $this->stop = '</div';
        $this->stopCatalog = '</div';
        $this->stopItem = '</div';
    }

    public function run()
    {
        //var_dump($this->parents);
        //var_dump($this->items);
        echo "<nav id='nav'><ul>";
        foreach ($this->parents as $key => $variable) {
            //var_dump($variable);
            echo '<li>';
            foreach ($variable as $key => $value) {
                //var_dump($value);
                if ($key == 'name') {
                    //echo "<div class='catalog__icon'></div>";
                    $this->article_parent_name = $value;
                    // echo "<a class='catalog__link'>".$value."</a><ul class = 'second'>";
                }
                if ($key == 'id1s') {
                    $this->article_parent_id1s = $value;
                    echo "<a class='catalog__link' href='/index.php?ProductSearch[catid1s]=".$this->article_parent_id1s."'>".$this->article_parent_name."</a><ul class = 'second'>";
                    $this->article = $value;
                    //echo "<div class='catalog__item_box'>";
                    foreach ($this->items as $key => $data) {
                        foreach ($data as $key => $item) {
                            //echo serialize($item);
                            //echo $item;
                            if ($key == 'name') {
                                $this->article_name = $item;
                                //echo $this->article_name;
                            }
                            if ($key == 'id1s') {
                                $this->article_id1s = $item;
                            }
                            if ($key == 'parentid1s') {
                                if ($item == $this->article) {
                                    //echo "<div class='catalog__icon'></div>";
                                    echo "<li><a   class='cat_items' href='/index.php?ProductSearch[catid1s]=".$this->article_id1s."' > ".$this->article_name.'</a></li>';
                                }
                            }
                        }
                    }
                    echo '</ul></a>';
                }
            }
            echo '</li>';
        }
        echo '</ul></nav>';

        return '
					
				';
    }
}
