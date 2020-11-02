<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productimage".
 *
 * @property int $id
 * @property int|null $ownerid
 * @property string|null $name
 * @property string|null $url
 *
 * @property Product $owner
 */
class Productimage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productimage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ownerid'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
            [['ownerid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['ownerid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ownerid' => 'Ownerid',
            'name' => 'Name',
            'url' => 'Url',
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Product::className(), ['id' => 'ownerid']);
    }

    public function getImagesList($id)
    {
        //SELECT * FROM `productimage` WHERE `ownerid` = 1001
        $sql = 'SELECT `url` from `productimage` WHERE `ownerid` = ' . $id;
        $search_res = Yii::$app->db->createCommand($sql)->queryAll();
        return $search_res;
    }

}
