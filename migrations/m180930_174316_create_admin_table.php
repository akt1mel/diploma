<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m180930_174316_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'password' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admin');
    }
}
