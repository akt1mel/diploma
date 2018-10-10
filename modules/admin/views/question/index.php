<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \app\modules\admin\models\Question;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'theme_id',
            [
                'attribute' => 'theme_id',
                'value' => function($data) {
                    return $data->theme->name;
                }
            ],
            'user_name',
            'user_email:email',
            'description',
            //'status',
            [
                'attribute' => 'status',
                'value' => function($data){
                        if ($data->status == Question::NEW_QUESTION) {
                            return '<span class="text-info">Ожидает ответа</span>';
                        } elseif ($data->status == Question::ACTIVE_QUESTION) {
                            return '<span class="text-success">Опубликован</span>';
                        } else {
                            return '<span class="text-danger">Скрыт</span>';
                        }
//                    switch ($data) {
//                        case 0: return '<span class="text-danger">Новый</span>';
//                        case 1: return '<span class="text-success">Активный</span>';
//                        case 2: return '<span class="text-danger">Скрытый</span>';
//                    }
                },
                'format' => 'html',
            ],
            'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
