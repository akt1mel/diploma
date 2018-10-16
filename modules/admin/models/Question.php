<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $theme_id
 * @property string $user_name
 * @property string $user_email
 * @property string $description
 * @property int $status
 * @property string $created
 *
 * @property Answer $answer
 * @property Theme $theme
 */
class Question extends \yii\db\ActiveRecord
{

    const NEW_QUESTION = 0;
    const ACTIVE_QUESTION = 1;
    const HIDDEN_QUESTION = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['theme_id', 'user_name', 'user_email', 'description', 'status', 'created'], 'required'],
            [['theme_id', 'status'], 'integer'],
            [['created'], 'safe'],
            [['user_name', 'user_email', 'description'], 'string', 'max' => 255],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::className(), 'targetAttribute' => ['theme_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theme_id' => 'Тема',
            'user_name' => 'Автор',
            'user_email' => 'Email',
            'description' => 'Вопрос',
            'status' => 'Статус',
            'created' => 'Время создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasOne(Answer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id' => 'theme_id']);
    }


    public function changeStatus($status ,$id)
    {

        if($status == 'save'){
           return $this->updateAll(['status' => Question::ACTIVE_QUESTION], "id = :id",[':id' => $id]);
        } elseif ($status == 'delete') {
            return $this->updateAll(['status' => Question::NEW_QUESTION], "id = :id",[':id' => $id]);
        }

        return null;
    }

}
