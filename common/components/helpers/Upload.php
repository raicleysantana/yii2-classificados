<?php


namespace common\components\helpers;

use Yii;
use yii\web\UploadedFile;

class Upload
{
    public $file;
    public $filename;
    public $path;
    public $pathUrl;

    public static function save($model, $attribute)
    {
        $file = null;
        $filename = '';
        $path = '';
        $pathUrl = '';

        $file = UploadedFile::getInstance($model, $attribute);

        if (empty($file)) {
            return $model->cur_imagem;
        }

        $filename = $file->baseName . '-' . Yii::$app->security->generateRandomString(5) . '.' . $file->extension;
        $path = Yii::getAlias('@storage/web/source/');
        $pathUrl = Yii::getAlias('@storageUrl/source/');
        $file->saveAs($path . $filename);

        return $pathUrl . $filename;
    }


    public function deleteImage($path)
    {

        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->avatar = null;
        $this->filename = null;

        return true;
    }
}