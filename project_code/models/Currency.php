<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Currency extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%currency}}';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['insert_dt'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}