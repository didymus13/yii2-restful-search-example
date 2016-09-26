<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class Superhero extends ActiveRecord implements Linkable
{
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['superhero/view', 'id' => $this->id], true),
        ];
    }
    
    public static function tableName()
    {
        return 'superheroes';
    }

    public function extraFields()
    {
        return ['superteam'];
    }

    public function getSuperteam()
    {
        return $this->hasOne(Superteam::class, ['id' => 'team_id']);
    }
}