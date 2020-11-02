<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $name
 * @property int|null $id1s
 * @property int $catid1s
 * @property string|null $description
 * @property string|null $serial
 * @property int|null $barcode
 * @property int $shop1sid
 * @property string|null $product_state
 * @property int|null $product_status
 * @property float|null $cost
 *
 * @property Catproduct $catid1s0
 * @property Shops $shop1s
 * @property Productimage[] $productimages
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'id1s', 'catid1s', 'barcode', 'shop1sid', 'product_status'], 'integer'],
            [['catid1s', 'shop1sid'], 'required'],
            [['description'], 'string'],
            [['cost'], 'number'],
            [['name', 'serial', 'product_state'], 'string', 'max' => 255],
            [['catid1s'], 'exist', 'skipOnError' => true, 'targetClass' => Catproduct::className(), 'targetAttribute' => ['catid1s' => 'id1s']],
            [['shop1sid'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop1sid' => 'shop1sid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'От',
            'updated_at' => 'Изменен',
            'name' => 'Наименование',
            'id1s' => 'Id1s',
            'catid1s' => '1с Категория ',
            'description' => 'Описание из 1С',
            'serial' => 'Сериный №',
            'barcode' => 'Штрихкод',
            'shop1sid' => 'Нахождение',
            'product_state' => 'Состояние',
            'product_status' => 'Статус',
            'cost' => 'Цена',
        ];
    }

    /**
     * Gets query for [[Catid1s0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatid1s0()
    {
        return $this->hasOne(Catproduct::className(), ['id1s' => 'catid1s']);
    }

    /**
     * Gets query for [[Shop1s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShop1s()
    {
        return $this->hasOne(Shops::className(), ['shop1sid' => 'shop1sid']);
    }

    /**
     * Gets query for [[Productimages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductimages()
    {
        return $this->hasMany(Productimage::className(), ['ownerid' => 'id']);
    }
}
