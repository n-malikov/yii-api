<?php

namespace frontend\resource;

class Post extends \common\models\Post
{

    public function fields()
    {
        return ['id', 'title', 'body']; // только эти поля вернутся в запросе
    }

    public function extraFields()
    {
        // отобразятся только при добавлении в url expand=created_at
        return ['created_at', 'createdBy'];
    }

}