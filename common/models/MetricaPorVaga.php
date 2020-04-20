<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "metrica_por_vaga".
 *
 * @property int $mp_id
 * @property string|null $ip
 * @property string $data
 * @property int $vaga_id
 * @property int|null $user_post
 * @property string|null $navegador
 * @property string|null $plataforma
 * @property string|null $os
 *
 * @property User $userPost
 * @property Vaga $vaga
 */
class MetricaPorVaga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metrica_por_vaga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'vaga_id'], 'required'],
            [['data'], 'safe'],
            [['vaga_id', 'user_post'], 'integer'],
            [['ip'], 'string', 'max' => 32],
            [['navegador', 'plataforma', 'os'], 'string', 'max' => 30],
            [['user_post'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_post' => 'id']],
            [['vaga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vaga::className(), 'targetAttribute' => ['vaga_id' => 'vaga_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mp_id' => 'Mp ID',
            'ip' => 'Ip',
            'data' => 'Data',
            'vaga_id' => 'Vaga ID',
            'user_post' => 'User Post',
            'navegador' => 'Navegador',
            'plataforma' => 'Plataforma',
            'os' => 'Os',
        ];
    }

    /**
     * Gets query for [[UserPost]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPost()
    {
        return $this->hasOne(User::className(), ['id' => 'user_post']);
    }

    /**
     * Gets query for [[Vaga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVaga()
    {
        return $this->hasOne(Vaga::className(), ['vaga_id' => 'vaga_id']);
    }
}
