<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "curtida".
 *
 * @property int $cur_id
 * @property int|null $user_id
 * @property string|null $ip
 * @property int $vaga_id
 *
 * @property User $user
 * @property Vaga $vaga
 */
class Curtida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curtida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'vaga_id'], 'integer'],
            [['vaga_id'], 'required'],
            [['ip'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['vaga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vaga::className(), 'targetAttribute' => ['vaga_id' => 'vaga_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cur_id' => 'Cur ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'vaga_id' => 'Vaga ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaga()
    {
        return $this->hasOne(Vaga::className(), ['vaga_id' => 'vaga_id']);
    }
}
