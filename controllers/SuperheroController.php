<?php
namespace app\controllers;

use app\models\searches\SuperheroSearch;
use app\models\Superhero;
use yii\rest\ActiveController;

class SuperheroController extends ActiveController
{
    public $modelClass = Superhero::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $search = new SuperheroSearch();
        return $search->search(\Yii::$app->request->getQueryParams());
    }
}
