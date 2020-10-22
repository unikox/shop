<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catproduct".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $id1s
 * @property int|null $parentid1s
 *
 * @property Catproduct $parentid1s0
 * @property Catproduct[] $catproducts
 * @property Product[] $products
 */
class Catproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id1s', 'parentid1s'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id1s'], 'unique'],
            [['parentid1s'], 'exist', 'skipOnError' => true, 'targetClass' => Catproduct::className(), 'targetAttribute' => ['parentid1s' => 'id1s']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id1s' => 'Id1s',
            'parentid1s' => 'Parentid1s',
        ];
    }

    /**
     * Gets query for [[Parentid1s0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentid1s0()
    {
        return $this->hasOne(Catproduct::className(), ['id1s' => 'parentid1s']);
    }

    /**
     * Gets query for [[Catproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatproducts()
    {
        return $this->hasMany(Catproduct::className(), ['parentid1s' => 'id1s']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['catid1s' => 'id1s']);
    }
}
