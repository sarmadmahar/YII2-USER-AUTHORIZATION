<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "TBL_AUTHORIZATION".
 *
 * @property string $AUTH_ID
 * @property string $AUTH_DESC
 * @property string $AUTH_TYPE
 * $property string $PAGE
 */
class TBLAUTHORIZATION extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TBL_AUTHORIZATION';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['AUTH_ID'], 'required'],
            [['AUTH_ID'], 'number'],
            [['AUTH_DESC','PAGE'], 'string', 'max' => 50],
            [['AUTH_TYPE'], 'string', 'max' => 5],
            [['AUTH_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AUTH_ID' => 'Auth  ID',
            'AUTH_DESC' => 'User/ Group',
            'AUTH_TYPE' => 'Auth  Type',
            'PAGE' => 'PAGE'
        ];
    }
}
