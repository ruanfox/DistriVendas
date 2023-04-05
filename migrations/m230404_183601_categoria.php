<?php

use yii\db\Migration;

/**
 * Class m230404_183601_categoria
 */
class m230404_183601_categoria extends Migration
{
    public function up()
    {
        $this->createTable('categoria', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull()->unique(),
        ]);

        // Adiciona as categorias iniciais
        
    }

    public function down()
    {
        $this->dropTable('categoria');
    }
}