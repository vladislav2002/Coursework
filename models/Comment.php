<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string|null $text
 * @property string|null $username
 * @property string|null $user_id
 * @property string|null $parent_id
 * @property string|null $article_id
 * @property string|null $date
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'text'], 'required'],
            [['id'], 'default', 'value' => null],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value'=>date('Y-m-d')],
            [['id', 'user_id', 'parent_id', 'article_id'], 'integer'],
            [['text', 'username'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'username' => 'Username',
            'user_id' => 'User ID',
            'parent_id' => 'Parent ID',
            'article_id' => 'Article ID',
            'date' => 'Date',
        ];
    }
}
