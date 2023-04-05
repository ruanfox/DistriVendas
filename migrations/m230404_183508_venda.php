<?php

use yii\db\Migration;

/**
 * Class m230404_183508_venda
 */
class m230404_183508_venda extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%venda}}', [
            'id' => $this->primaryKey(),
            'data_venda' => $this->dateTime()->notNull(),
            'vendedor_id' => $this->integer()->notNull(),
        ]);

        // Adiciona chave estrangeira para a tabela pessoa
        $this->addForeignKey(
            'fk_venda_pessoa_vendedor_id',
            '{{%venda}}',
            'vendedor_id',
            '{{%pessoa}}',
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
        $this->dropForeignKey('fk_venda_pessoa_vendedor_id', '{{%venda}}');

        $this->dropTable('{{%venda}}');
    }
}