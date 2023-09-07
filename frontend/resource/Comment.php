<?php

namespace frontend\resource;

class Comment extends \common\models\Comment
{

    public function fields()
    {
        return ['id', 'title', 'body', 'post_id']; // только эти поля вернутся в запросе
    }

    public function extraFields()
    {
        // отобразятся только при добавлении в url /comments/1?expand=post
        return ['post'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        // из наследуемого класса вынесли сюда, чтоб возвращались только те поля, что указаны в fields
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}