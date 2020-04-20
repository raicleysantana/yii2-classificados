<?php

namespace common\models;

use common\components\db\ActiveRecord;
use Yii;
use yii\web\UploadedFile;

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
class Vaga extends ActiveRecord
{
    public $file;

    protected $traducoes = [
        'vaga_status' => 'getSituacaoOptions',
];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vaga_titulo', 'vaga_status', 'user_id'], 'required'],
            [['vaga_publicado', 'file'], 'safe'],
            [['vaga_descricao'], 'string'],
            [['user_id'], 'integer'],
            [['vaga_titulo', 'vaga_empresa', 'vaga_contato'], 'string', 'max' => 255],
            [['vaga_status'], 'string', 'max' => 1],
            [['vaga_arquivo'], 'string', 'max' => 1000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vaga_id' => 'Vaga ID',
            'vaga_titulo' => 'Título da vaga',
            'vaga_empresa' => 'Empresa',
            'vaga_contato' => 'Contato',
            'vaga_publicado' => 'Publicado',
            'vaga_status' => 'Status',
            'vaga_descricao' => 'Descrição',
            'vaga_arquivo' => 'Upload de arquivo',
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

    public function incrementaCurtida()
    {
        $this->vaga_qtde_curtida = ($this->vaga_qtde_curtida + 1);
        $this->save(false);
    }

    public function decrementaCurtida()
    {
        $this->vaga_qtde_curtida > 0 ? $this->vaga_qtde_curtida = ($this->vaga_qtde_curtida - 1) : false;
        $this->save(false);
    }

    public function saveUpload()
    {
        $this->file = UploadedFile::getInstance($this, 'file');

        if ($this->file) {
            $pathFile = $this->file->baseName . '.' . $this->file->extension;
            $path = Yii::getAlias('@storage/web/source/vaga_upload/');
            $this->file->saveAs($path . $pathFile);
            $this->vaga_arquivo = $path . $pathFile;
        }


    }
}
