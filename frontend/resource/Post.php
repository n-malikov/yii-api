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
        // отобразятся только при добавлении в url expand=comments или expand=comments.id
        return ['comments', 'createdBy'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        // из наследуемого класса вынесли сюда, чтоб возвращались только те поля, что указаны в fields
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}