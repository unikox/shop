<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catproduct".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $id1s
 * @property string|null $parentid1s
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
            [['name', 'id1s', 'parentid1s'], 'string', 'max' => 255],
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
            'name' => 'Категория',
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
    public function getparentsCats(){

        $sql="SELECT * FROM `catproduct` WHERE  `parentid1s` is NULL";
        $res_cats = Yii::$app->db->createCommand($sql)->queryAll();
        return $res_cats;
    }
    public function getCatsItem(){

        $sql="SELECT * FROM `catproduct` WHERE  `parentid1s` is not NULL";
        $res_cats = Yii::$app->db->createCommand($sql)->queryAll();
        return $res_cats;
    }
}
