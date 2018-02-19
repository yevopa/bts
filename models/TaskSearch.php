<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tasktype_id', 'taskpriority_id', 'taskstatus_id', 'sprint_id', 'version_id', 'resolved_version_id', 'detected_version_id', 'performer_id', 'owner_id', 'parenttask_id', 'relatedtask_id'], 'integer'],
            [['name', 'description', 'create_date', 'finish_date', 'plan_date'], 'safe'],
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
        $query = Task::find();

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
            'create_date' => $this->create_date,
            'finish_date' => $this->finish_date,
            'plan_date' => $this->plan_date,
            'tasktype_id' => $this->tasktype_id,
            'taskpriority_id' => $this->taskpriority_id,
            'taskstatus_id' => $this->taskstatus_id,
            'sprint_id' => $this->sprint_id,
            'version_id' => $this->version_id,
            'resolved_version_id' => $this->resolved_version_id,
            'detected_version_id' => $this->detected_version_id,
            'performer_id' => $this->performer_id,
            'owner_id' => $this->owner_id,
            'parenttask_id' => $this->parenttask_id,
            'relatedtask_id' => $this->relatedtask_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
