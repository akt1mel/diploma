<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\modules\admin\models\Question;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question_id')->dropDownList(ArrayHelper::map(Question::find()->where(['or',['status' => Question::NEW_QUESTION],['status' => Question::HIDDEN_QUESTION]])->all(), 'id', 'description')) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
