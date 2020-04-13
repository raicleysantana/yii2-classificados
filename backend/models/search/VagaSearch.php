<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vaga;

/**
 * VagasSearch represents the model behind the search form about `common\models\Vagas`.
 */
class VagaSearch extends Vaga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vaga_id', 'user_id'], 'integer'],
            [['vaga_titulo', 'vaga_empresa', 'vaga_contato', 'vaga_publicado', 'vaga_status', 'vaga_descricao', 'vaga_arquivo'], 'safe'],
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
        $query = Vaga::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'vaga_id' => $this->vaga_id,
            'vaga_publicado' => $this->vaga_publicado,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'vaga_titulo', $this->vaga_titulo])
            ->andFilterWhere(['like', 'vaga_empresa', $this->vaga_empresa])
            ->andFilterWhere(['like', 'vaga_contato', $this->vaga_contato])
            ->andFilterWhere(['like', 'vaga_status', $this->vaga_status])
            ->andFilterWhere(['like', 'vaga_descricao', $this->vaga_descricao])
            ->andFilterWhere(['like', 'vaga_arquivo', $this->vaga_arquivo]);

        return $dataProvider;
    }
}
