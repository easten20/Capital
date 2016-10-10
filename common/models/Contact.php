<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 */
class Contact extends \yii\db\ActiveRecord
{
     public $verifyCode;
     
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [                    
            [['body', 'is_readed'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['subject'], 'string', 'max' => 516],
             // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'on'  => 'register'],
            ['email', 'email'],
            [['name', 'email', 'subject', 'body'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'body' => 'Body',
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * @inheritdoc
     * @return ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}
