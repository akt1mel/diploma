<?php use yii\helpers\Html; ?>

<div class="container">
    <div class="panel-group" id="accordion">
    <?php foreach ($themes as $theme): ?>
    <div class="faqHeader"><?= Html::encode($theme->name) ?></div>
        <?php foreach ($questions as $question):?>
            <?php if($question['theme']['name'] == $theme->name): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?= Html::encode($question['id']) ?>"><?= Html::encode($question['description']) ?></a>
                    </h4>
                </div>
                <div id="<?= Html::encode($question['id']) ?>" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <?= Html::encode($question['answer']['answer']) ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php endforeach; ?>
