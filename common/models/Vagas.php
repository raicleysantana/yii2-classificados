<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vagas".
 *
 * @property int $vaga_id
 * @property string $vaga_titulo
 * @property string|null $vaga_empresa
 * @property string|null $vaga_contato
 * @property string $vaga_publicado
 * @property string $vaga_status
 * @property string|null $vaga_descricao
 * @property string|null $vaga_arquivo
 * @property int $user_id
 *
 * @property User $user
 */
class Vagas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vagas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vaga_titulo', 'vaga_status', 'user_id'], 'required'],
            [['vaga_publicado'], 'safe'],
            [['vaga_descricao'], 'string'],
            [['user_id'], 'integer'],
            [['vaga_titulo', 'vaga_empresa', 'vaga_contato'], 'string', 'max' => 255],
            [['vaga_status'], 'string', 'max' => 1],
            [['vaga_arquivo'], 'string', 'max' => 1000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vaga_id' => 'Vaga ID',
            'vaga_titulo' => 'Título',
            'vaga_empresa' => 'Empresa',
            'vaga_contato' => 'Contato',
            'vaga_publicado' => 'Publicado',
            'vaga_status' => 'Status',
            'vaga_descricao' => 'Descrição',
            'vaga_arquivo' => 'Upload',
            'user_id' => 'Usuário',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getSituacaoOptions()
    {
        return [
            'A' => 'Ativo',
            'I' => 'Inativo',
        ];
    }
}
