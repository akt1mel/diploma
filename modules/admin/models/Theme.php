<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property int $id
 * @property string $name
 *
 * @property Question[] $questions
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название Темы',
            'questions' => 'Всего вопросов',
            'new_questions' => 'Новые вопросы',
            'active_questions' => 'Опубликованые вопросы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['theme_id' => 'id']);
    }

    public function getQuestionCount()
    {
        return Question::find()->where(['theme_id' => $this->id])->with('question')->count();
    }

    public function getNewQuestionCount()
    {
        return Question::find()->where(['AND',['theme_id' => $this->id],['status' => Question::NEW_QUESTION]])->with('question')->count();
    }

    public function getActiveQuestionCount()
    {
        return Question::find()->where(['AND',['theme_id' => $this->id],['status' => Question::ACTIVE_QUESTION]])->with('question')->count();
    }

}
