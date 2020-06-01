<?php

namespace common\models;

use common\components\db\ActiveRecord;
use trntv\filekit\behaviors\UploadBehavior;
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


    public function behaviors()
    {
        return [
            'file' => [
                'class' => UploadBehavior::class,
                'attribute' => 'file',
                'pathAttribute' => 'vaga_img_path',
                'baseUrlAttribute' => 'vaga_base_url'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vaga_titulo', 'vaga_status', 'user_id'], 'required'],
            [['vaga_publicado', 'file', 'vaga_contato', 'vaga_empresa', 'vaga_arquivo'], 'safe'],
            [['vaga_descricao'], 'string'],
            [['user_id'], 'integer'],
            [['vaga_titulo', 'vaga_empresa', 'vaga_contato'], 'string', 'max' => 255],
            [['vaga_status'], 'string', 'max' => 1],
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
            'vaga_titulo' => 'Título da vaga',
            'vaga_empresa' => 'Empresa',
            'vaga_contato' => 'Contato',
            'vaga_publicado' => 'Publicado',
            'vaga_status' => 'Status',
            'vaga_descricao' => 'Descrição',
            'vaga_arquivo' => 'Upload de arquivo',
            'user_id' => 'Usuário',
            'file' => 'Upload de arquivo',
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

    public function saveUpload()
    {
        $this->file = UploadedFile::getInstance($this, 'file');

        if ($this->file) {
            $pathFile = $this->file->baseName . '.' . $this->file->extension;
            $path = Yii::getAlias('@storageUrl/web/source/');
            $this->file->saveAs($path . $pathFile);
            $this->vaga_arquivo = $path . $pathFile;
        }
    }

    public function getImagem()
    {
        return $this->vaga_base_url . $this->vaga_img_path;
    }
}
