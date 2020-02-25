<?php
namespace app\models\searches;

use app\models\Superhero;
use yii\data\ActiveDataProvider;

class SuperheroSearch extends Superhero
{
    public $name;
    public $origin;
    public $team;

    public function rules()
    {
        return [
            [['name', 'origin', 'team'], 'safe']
        ];
    }
    public function search($params)
    {
        $query = Superhero::find()->joinWith('superteam');
        $dataProvider = new ActiveDataProvider([
           'query' => $query
        ]);

        $this->load($params, '');
        if (!$this->validate()) {
            return $dataProvider; // If validation fails, just return the unfiltered list
        }

        $query->andFilterWhere(['like', 'codename', $this->name])
            ->andFilterWhere(['like', 'team.name', $this->team])
            ->andFilterWhere(['origin' => $this->origin]);

        return $dataProvider;
    }
}
