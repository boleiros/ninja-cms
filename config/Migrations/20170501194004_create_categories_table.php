<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('categories');

        $table->addColumn('title', 'string', [
            'default'   => null,
            'limit'     => 100,
            'null'      => false,
        ]);
        
        $table->addColumn('slug','string')->addIndex(array('slug'), array('unique' => true));

        $table->addColumn('sequence', 'integer', [
            'default'   =>  null,
            'limit'     =>  null,
            'null'      => false,
        ]);

        $table->addColumn('description', 'text', [
            'default'   => null,
            'limit'     => null,
            'null'      => false,
        ]);
        $table->addColumn('created', 'timestamp', ['default' => null,'null' => false]);
        $table->addColumn('modified', 'timestamp', ['default' => null,'null' => false]);

        $table->create();
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
