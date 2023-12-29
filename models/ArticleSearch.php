<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'description', 'image_path', 'markers', 'date'], 'safe'],
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
        $query = Article::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'image_path', $this->image_path])
            ->andFilterWhere(['ilike', 'markers', $this->markers])
            ->andFilterWhere(['ilike', 'date', $this->date]);

        return $dataProvider;
    }


    /**
     * @return ActiveDataProvider
     */
    public function searchByTopic($params, $topic_id){
        if (null == Article::find()->where(['topic_id' => $topic_id])) {
            return null;
        }

        $query = Article::find()->where(['topic_id' => $topic_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        return $dataProvider;
    }

    /**
     * @return ActiveDataProvider
     */
    public function searchById($params, $article_id){
        if (null == Article::find()->where(['id' => $article_id])) {
            return null;
        }

        $query = Article::find()->where(['id' => $article_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        return $dataProvider;
    }

    /**
     * @return ActiveDataProvider
     */
    public function searchAll($params){
        if (null == Article::find()->all()) {
            return null;
        }

        $query = Article::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        return $dataProvider;
    }
}
