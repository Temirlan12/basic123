<?php

namespace app\models;

use Yii\db\ActiveRecord;

class News extends \yii\db\ActiveRecord
{

    public static function tableName(){
        return 'news';
    }
    public function attributeLabels()
    {
        return[
            'id' => 'id',
            'title' => 'Тема',
            'text' => 'Текст',
        ];
    }
    public function rules()
    {
        return [
            [['title','text'],'required'],
        ];
    }

}
