<?php

namespace frontend\modules\user\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vagas;

/**
 * vagasSearch represents the model behind the search form of `common\models\Vagas`.
 */
class vagasSearch extends Vagas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vaga_id', 'user_id'], 'integer'],
            [['vaga_titulo', 'vaga_empresa', 'vaga_contato', 'vaga_publicado', 'vaga_status', 'vaga_descricao', 'vaga_arquivo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Vagas::find();

        $query->where(['user_id' => \Yii::$app->user->id]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
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
