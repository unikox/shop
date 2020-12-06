<?php

namespace frontend\widgets\siteComponents;

use Closure;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\BaseListView;

class pubProductList extends BaseListView
{
    // public $groupCounter = 0;
    // public $groupTriger = false;
    public $itemOptions = [];
    /**
     * @var string|callable the name of the view for rendering each data item, or a callback (e.g. an anonymous function)
     *                      for rendering each data item. If it specifies a view name, the following variables will
     *                      be available in the view:
     *
     * - `$model`: mixed, the data model
     * - `$key`: mixed, the key value associated with the data item
     * - `$index`: integer, the zero-based index of the data item in the items array returned by [[dataProvider]].
     * - `$widget`: ListView, this widget instance
     *
     * Note that the view name is resolved into the view file by the current context of the [[view]] object.
     *
     * If this property is specified as a callback, it should have the following signature:
     *
     * ```php
     * function ($model, $key, $index, $widget)
     * ```
     */
    public $itemView;
    /**
     * @var array additional parameters to be passed to [[itemView]] when it is being rendered.
     *            This property is used only when [[itemView]] is a string representing a view name.
     */
    public $viewParams = [];
    /**
     * @var string the HTML code to be displayed between any two consecutive items.
     */
    public $separator = "\n";
    /**
     * @var array the HTML attributes for the container tag of the list view.
     *            The "tag" element specifies the tag name of the container element and defaults to "div".
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = ['class' => 'product__view'];
    /**
     * @var Closure an anonymous function that is called once BEFORE rendering each data model.
     *              It should have the following signature:
     *
     * ```php
     * function ($model, $key, $index, $widget)
     * ```
     *
     * - `$model`: the current data model being rendered
     * - `$key`: the key value associated with the current data model
     * - `$index`: the zero-based index of the data model in the model array returned by [[dataProvider]]
     * - `$widget`: the ListView object
     *
     * The return result of the function will be rendered directly.
     * Note: If the function returns `null`, nothing will be rendered before the item.
     *
     * @see renderBeforeItem
     * @since 2.0.11
     */
    public $beforeItem;
    /**
     * @var Closure an anonymous function that is called once AFTER rendering each data model.
     *
     * It should have the same signature as [[beforeItem]].
     *
     * The return result of the function will be rendered directly.
     * Note: If the function returns `null`, nothing will be rendered after the item.
     *
     * @see renderAfterItem
     * @since 2.0.11
     */
    public $afterItem;

    /**
     * Renders all data models.
     *
     * @return string the rendering result
     */
    public function renderItems()
    {
        $models = $this->dataProvider->getModels();
        $keys = $this->dataProvider->getKeys();
        $rows = [];
        foreach (array_values($models) as $index => $model) {
            /*          $this->groupCounter++;
                      if($this->groupCounter == 3){
                          $this->groupTriger = true;

                          array_push($rows, "<div class=\"product_group\">");
                          //.'<div class="product_group">';
                          $this->groupCounter = 0;
                          var_dump($rows);
                      }
*/
            $key = $keys[$index];
            if (($before = $this->renderBeforeItem($model, $key, $index)) !== null) {
                $rows[] = $before;
            }

            $rows[] = $this->renderItem($model, $key, $index);

            if (($after = $this->renderAfterItem($model, $key, $index)) !== null) {
                $rows[] = $after;
            }
            /*            if($this->groupTriger){
                            $this->groupTriger = false;
                            array_push($rows, "</div>");
                            //$rows = $rows .'</div>';

                        }
            */
        }

        return implode($this->separator, $rows);
    }

    /**
     * Calls [[beforeItem]] closure, returns execution result.
     * If [[beforeItem]] is not a closure, `null` will be returned.
     *
     * @param mixed $model the data model to be rendered
     * @param mixed $key   the key value associated with the data model
     * @param int   $index the zero-based index of the data model in the model array returned by [[dataProvider]].
     *
     * @return string|null [[beforeItem]] call result or `null` when [[beforeItem]] is not a closure
     *
     * @see beforeItem
     * @since 2.0.11
     */
    protected function renderBeforeItem($model, $key, $index)
    {
        if ($this->beforeItem instanceof Closure) {
            return call_user_func($this->beforeItem, $model, $key, $index, $this);
        }

        return null;
    }

    /**
     * Calls [[afterItem]] closure, returns execution result.
     * If [[afterItem]] is not a closure, `null` will be returned.
     *
     * @param mixed $model the data model to be rendered
     * @param mixed $key   the key value associated with the data model
     * @param int   $index the zero-based index of the data model in the model array returned by [[dataProvider]].
     *
     * @return string|null [[afterItem]] call result or `null` when [[afterItem]] is not a closure
     *
     * @see afterItem
     * @since 2.0.11
     */
    protected function renderAfterItem($model, $key, $index)
    {
        if ($this->afterItem instanceof Closure) {
            return call_user_func($this->afterItem, $model, $key, $index, $this);
        }

        return null;
    }

    /**
     * Renders a single data model.
     *
     * @param mixed $model the data model to be rendered
     * @param mixed $key   the key value associated with the data model
     * @param int   $index the zero-based index of the data model in the model array returned by [[dataProvider]].
     *
     * @return string the rendering result
     */
    public function renderItem($model, $key, $index)
    {
        if ($this->itemView === null) {
            $content = $key;
        } elseif (is_string($this->itemView)) {
            $content = $this->getView()->render($this->itemView, array_merge([
                'model' => $model,
                'key' => $key,
                'index' => $index,
                'widget' => $this,
            ], $this->viewParams));
        } else {
            $content = call_user_func($this->itemView, $model, $key, $index, $this);
        }
        if ($this->itemOptions instanceof Closure) {
            $options = call_user_func($this->itemOptions, $model, $key, $index, $this);
        } else {
            $options = $this->itemOptions;
        }
        $tag = ArrayHelper::remove($options, 'tag', 'div ');
        $options['data-key'] = is_array($key) ? json_encode($key, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string) $key;

        return Html::tag($tag, $content, $options);
    }
}
