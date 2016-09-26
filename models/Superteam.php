<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class Superteam extends ActiveRecord implements Linkable
{

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['superteam/view', 'id' => $this->id], true),
        ];
    }

    public static function tableName()
    {
        return 'superteams';
    }

    public function extraFields()
    {
        return ['superheroes'];
    }

    public function getSuperheroes()
    {
        return $this->hasMany(Superhero::class, ['team_id' => 'id']);
    }
}