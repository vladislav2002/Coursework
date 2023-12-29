<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BlogUser;

/**
 * BlogUserSearch represents the model behind the search form of `app\models\BlogUser`.
 */
class BlogUserSearch extends BlogUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['id', 'username', 'email', 'password', 'authkey', 'accesstoken'], 'safe'],
            [['id', 'username', 'email', 'password', 'image'], 'safe'],
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
        $query = BlogUser::find();

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
        $query->andFilterWhere(['ilike', 'username', $this->username])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'password', $this->password])
            ->andFilterWhere(['ilike', 'image', $this->image]);
            //->andFilterWhere(['ilike', 'authkey', $this->authkey])
            //->andFilterWhere(['ilike', 'accesstoken', $this->accesstoken]);

        return $dataProvider;
    }
}
