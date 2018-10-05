<?php

use yii\db\Migration;

/**
 * Handles the creation of table `question`.
 */
class m181002_175501_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'theme_id' => $this->integer()->notNull(),
            'user_name' => $this->string()->notNull(),
            'user_email' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'created' => $this->dateTime()->notNull(),
        ]);
        $this->addForeignKey('theme_question_id','question', 'theme_id', 'theme', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('question');
    }
}
