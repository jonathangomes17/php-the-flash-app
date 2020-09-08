<?php

use Phinx\Migration\AbstractMigration;

class Actions extends AbstractMigration
{
    public function change()
    {
        $this->table('action', ['primary_key' => 'id', 'signed' => false])
            ->addColumn('name', 'string', ['length' => 255, 'null' => false])
            ->addColumn('type', 'enum', [
                'default' => 'OTHER',
                'values'  => [
                    'OTHER',
                    'CREATE',
                    'READ',
                    'UPDATE',
                    'DELETE'
                ],
                'comment' => 'Atribui um tipo a uma ação'
            ])
            ->addColumn('description', 'text')
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('modified_at', 'datetime', ['null' => false])
            ->addColumn('deleted_at', 'datetime', ['null' => false])
            ->addIndex('name', ['unique' => true, 'name' => 'IDX_action_name'])
            ->create();
    }
}
