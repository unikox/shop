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
    private $article_name;

	public function init()
	{
		parent::init();

		if ($this->parents === null) {
			$this->parents ='безимянный раздел';
		}

		if ($this->items === null) {
			$this->items ='безимянный подраздел';
		}

		
		$this->start = "<div class='item_box'> ";
		$this->startCatalog = "<div class='index_catalog'>";
		$this->startItem = "<div class='index_catalog'>";

        $this->stop = "</div";
        $this->stopCatalog  = "</div";
        $this->stopItem = "</div";


	}
	public function run()
	{
    //var_dump($this->parents);
    //var_dump($this->items);
        echo "<nav id='nav'><ul>";
		foreach ($this->parents as $key => $variable) {
		    //var_dump($variable);
            echo "<li>";
            foreach ($variable as $key => $value) {
                //var_dump($value);
                if($key == "name"){
                    //echo "<div class='catalog__icon'></div>";
                    echo "<a class='catalog__link'>".$value."</a><ul class = 'second'>";
                }
                    if($key == "id1s" ){
                        $this->article = $value;
                        //echo "<div class='catalog__item_box'>";
                        foreach ($this->items as $key => $data){
                            foreach ($data as $key => $item){
                                //echo serialize($item);
                                //echo $item;
                                if($key == "name"){

                                    $this->article_name = $item;
                                    //echo $this->article_name;
                                }
                                if($key == "parentid1s"){

                                    if($item == $this->article){
                                        //echo "<div class='catalog__icon'></div>";
                                        echo "<li><a > " . $this->article_name . "</a></li>";
                                    }
                                }
                            }

                        }
                        echo "</ul></a>";
                    }

            }
            echo "</li>";
        }
        echo "</ul></nav>";
		/*foreach ($this->parents as $key => $variable) {
			foreach ($variable as $key => $value) {
				if ($key == "id"){
					$this->menuItemId=$value;
				}
				if ($key == "name"){
					//echo "<h4>mItemStart</h4>";
					echo '<li>';
					if( $this->menuItemHeader != $this->menuItemId ){
					    if($value == "Главная"){
                            echo '<a class="accordion-toggle collapsed" href="index.php?r=site/index">' . $value ."</a>";
                        }
                        elseif($value == "Новости"){
                            echo '<a class="accordion-toggle collapsed" href="index.php?r=news">' . $value ."</a>";
                        }
                        else{
                            echo '<a href="#group_menu' . $this->menuItemId . '" class="accordion-toggle collapsed"  data-toggle="collapse">'. $value .'</a>';
                        }


						echo '<div id="group_menu' . $this->menuItemId . '" class="panel-collapse collapse"><ul>';

						$this->menuItemHeader = $this->menuItemId;
						//echo "menuItemId:".$this->menuItemId;						
					}

					foreach ($this->subsections as $subsectionskey => $subsectionsvalue) {

						foreach ($subsectionsvalue as $subsectkey => $subsectvalue) {
							//$this->menuItemUrlId = (int)$subsectvalue;
							if( $subsectkey == "id" and !$this->menuEq  ){
								$this->menuItemUrlId = (int)$subsectvalue;
							}
							if( $subsectkey == "name" and $this->menuEq ){
									//echo "<h4>mSubItemStart</h4>";
									echo '<li>';
									echo '<a  href="index.php?r=pages%2Fview&id='. $this->menuItemUrlId . '">' .  $subsectvalue . '</a>';
									echo '</li>';
									//echo $subsectvalue;	
									//echo "<h4>mSubItemStop</h4>";
									$this->menuEq=false;

							}							
							if( $subsectkey == 'menuitem_id' ){
								if((int)$subsectvalue == $this->menuItemId){
									$this->menuEq=true;	
								}
							}
						}
						
					}
					echo 		"</ul>";
					echo 	"</div>";
					echo "</li>";
					//echo "<h4>mItemStop</h4>";
				}

			};
			//echo "</ul>" ;
		}
		echo "</ul>" ;
	*/
		return "
					
				";

	}
	
}
