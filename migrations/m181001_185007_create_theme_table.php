<?php

use yii\db\Migration;

/**
 * Handles the creation of table `theme`.
 */
class m181001_185007_create_theme_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('theme', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('theme');
    }
}
