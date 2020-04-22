<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Curso;

/**
 * CursoSearch represents the model behind the search form about `common\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cur_id'], 'integer'],
            [['cur_nome', 'cur_imagem', 'cur_descricao', 'cur_formato'], 'safe'],
            [['cur_preco'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Curso::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cur_id' => $this->cur_id,
            'cur_preco' => $this->cur_preco,
        ]);

        $query->andFilterWhere(['like', 'cur_nome', $this->cur_nome])
            ->andFilterWhere(['like', 'cur_imagem', $this->cur_imagem])
            ->andFilterWhere(['like', 'cur_descricao', $this->cur_descricao])
            ->andFilterWhere(['like', 'cur_formato', $this->cur_formato]);

        return $dataProvider;
    }
}
