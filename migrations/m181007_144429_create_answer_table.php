<?php

use yii\db\Migration;

/**
 * Handles the creation of table `answer`.
 */
class m181007_144429_create_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('answer', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'answer' => $this->text(),
        ]);
        $this->addForeignKey('answer_question_id','answer', 'question_id', 'question', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('answer');
    }
}
