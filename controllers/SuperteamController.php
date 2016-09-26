<?php
namespace app\controllers;

use app\models\Superteam;
use yii\rest\ActiveController;

class SuperteamController extends ActiveController
{
    public $modelClass = Superteam::class;
}