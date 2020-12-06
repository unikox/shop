<?php

namespace app\models;

/**
 * This is the model class for table "slider".
 *
 * @property int         $id
 * @property int|null    $slider_id
 * @property string|null $item_name
 * @property string|null $url
 * @property string|null $title
 * @property string|null $item_body
 * @property int|null    $position
 * @property int|null    $posted
 * @property int|null    $created_at
 * @property int|null    $updated_at
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;

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
            'slider_id' => 'Принадлежность',
            'item_name' => 'Название',
            'url' => 'Ссылка',
            'title' => 'Заголовок',
            'item_body' => 'Содержимое',
            'position' => 'Порядковый номер',
            'posted' => 'Опубликовать',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            //$this->item_name= $this->imageFile->baseName . '.' . $this->imageFile->extension;

            if ($this->imageFile) {
                $this->url = Url::base(true).'/uploads/'.$this->imageFile->baseName.'.'.$this->imageFile->extension;
                $this->save();
                $this->imageFile->saveAs('uploads/'.$this->imageFile->baseName.'.'.$this->imageFile->extension);
            }

            return true;
        } else {
            return false;
        }
    }
}
