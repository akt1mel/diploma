<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;


$this->title = 'Задать вопрос';
?>
<div class="site-add-question">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('AddQuestionFormSubmitted')): ?>

        <div class="alert alert-success">
            Ваш вопрос будет опубликован после рассмотрения и получения ответа.
        </div>

    <?php else: ?>

        <p>
            Для добавления интересующего Вас вопроса заполните поля ниже и нажмите кнопку "Отправить".
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'add-question-form']); ?>

                <?= $form->field($model, 'user_name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'user_email') ?>

                <?php


                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
                $items = ArrayHelper::map(\app\models\Theme::getThemes(),'id','name');
                $params = [
                    'prompt' => 'Выберете тему'
                ];
                echo $form->field($model, 'theme_id')->dropDownList($items,$params);
                ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>



                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'add-question-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
