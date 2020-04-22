<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "curso".
 *
 * @property int $cur_id
 * @property string $cur_nome
 * @property float|null $cur_preco
 * @property string|null $cur_imagem
 * @property string|null $cur_descricao
 * @property string|null $cur_formato
 * @property string $cur_link
 * @property string cur_base_url
 */
class Curso extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cur_nome', 'cur_url_paginavenda', 'cur_url_checkout'], 'required'],
            [['cur_preco'], 'safe'],
            [['cur_descricao'], 'string'],
            [['cur_nome'], 'string', 'max' => 80],
            [['cur_imagem'], 'string', 'max' => 255],
            [['cur_formato'], 'string', 'max' => 300],
            [['cur_url_paginavenda', 'cur_url_checkout'], 'string', 'max' => 1000],
            [['file'], 'file', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cur_id' => 'Código',
            'cur_nome' => 'Nome',
            'cur_preco' => 'Preço',
            'cur_imagem' => 'Imagem',
            'cur_descricao' => 'Descricao',
            'cur_formato' => 'Formato',
            'cur_url_paginavenda' => 'URL da pagina de venda',
            'cur_url_checkout' => 'Pagina de Pagamento',
            'file' => 'Imagem',
        ];
    }

    public function getImagem()
    {
        return Yii::getAlias('@storageUrl/source/') . $this->cur_imagem;
    }

    public function saveUpload()
    {
        $file = null;
        $filename = '';
        $path = '';
        $pathUrl = '';

        $file = UploadedFile::getInstance($this, 'file');

        if (empty($file)) {
            return $this->cur_imagem;
        }

        $filename = $file->baseName . '-' . Yii::$app->security->generateRandomString(5) . '.' . $file->extension;
        $path = Yii::getAlias('@storage/web/source/');
        $file->saveAs($path . $filename);

        $this->cur_base_url = $path;
        $this->cur_imagem = $filename;
    }

}
