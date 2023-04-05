<?php

namespace app\models;

use yii\db\ActiveRecord;

class Pessoa extends ActiveRecord
{
    public static function tableName()
    {
        return 'pessoa';
    }
    
    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }
}
