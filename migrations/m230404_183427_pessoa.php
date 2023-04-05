<?php

use yii\db\Migration;

/**
 * Class m230404_183427_pessoa
 */
class m230404_183427_pessoa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pessoa}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
            'senha' => $this->string(255)->notNull(),
            'email' => $this->string(100)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pessoa}}');
    }
}