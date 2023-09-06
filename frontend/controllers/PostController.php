<?php

namespace frontend\controllers;

use frontend\resource\Post;
//use common\models\Post;
use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = Post::class;
}
