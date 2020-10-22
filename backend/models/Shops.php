<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shops".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $shop1sid
 * @property string|null $name
 * @property string|null $city
 * @property string|null $area
 * @property string|null $tel
 * @property string|null $address
 *
 * @property Product[] $products
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'shop1sid'], 'integer'],
            [['shop1sid'], 'required'],
            [['name', 'city', 'area', 'tel', 'address'], 'string', 'max' => 255],
            [['shop1sid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'shop1sid' => 'Shop1sid',
            'name' => 'Name',
            'city' => 'City',
            'area' => 'Area',
            'tel' => 'Tel',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['shop1sid' => 'shop1sid']);
    }
}
