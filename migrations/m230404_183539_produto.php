<?php

use yii\db\Migration;

/**
 * Class m230404_183539_produto
 */
class m230404_183539_produto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produto}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string(255)->notNull(),
            'valor' => $this->decimal(10,2)->notNull(),
            'categoria_id' => $this->integer()->notNull(),
        ]);

        // Adiciona chave estrangeira para a tabela categoria
        $this->addForeignKey(
            'fk_produto_categoria_id',
            '{{%produto}}',
            'categoria_id',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remove chave estrangeira
        $this->dropForeignKey('fk_produto_categoria_id', '{{%produto}}');

        $this->dropTable('{{%produto}}');
    }
}
