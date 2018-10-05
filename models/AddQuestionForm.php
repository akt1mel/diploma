<?php


namespace app\models;


class AddQuestionForm extends Theme
{
    const NEW_QUESTION = 0;



    public static function tableName()
    {
        return 'question';
    }


    public function attributeLabels()
    {
        return [
            'user_name' => 'Имя',
            'user_email' => 'Email',
            'theme_id' => 'Тема',
            'description' => 'Вопрос',

        ];
    }

    public function rules()
    {

        return [
            //Обязательные поля
            [['theme_id','user_name', 'user_email', 'description'], 'required'],
            //Проверка email на правильность ввода
            ['user_email', 'email'],
            //[['created'],'date', 'format' => 'php:Y-m-d H:i:s'],
        ];
    }


    public function addQuestion()
    {
        $this->status = self::NEW_QUESTION;
        $this->created = date('Y-m-d H:i:s');

        return $this->save();
    }


}