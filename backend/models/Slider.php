<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property int|null $slider_id
 * @property string|null $item_name
 * @property string|null $url
 * @property string|null $title
 * @property string|null $item_body
 * @property int|null $position
 * @property int|null $posted
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_id', 'position', 'posted', 'created_at', 'updated_at'], 'integer'],
            [['item_body'], 'string'],
            [['item_name', 'url', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_id' => 'Slider ID',
            'item_name' => 'Item Name',
            'url' => 'Url',
            'title' => 'Title',
            'item_body' => 'Item Body',
            'position' => 'Position',
            'posted' => 'Posted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
