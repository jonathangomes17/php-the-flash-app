<?php

use Phinx\Migration\AbstractMigration;

class Action extends AbstractMigration
{
    public function change()
    {
        $this->table('action', ['primary_key' => 'id', 'signed' => false, 'identity' => true])
            ->addColumn('name', 'string', ['length' => 255, 'null' => false])
            ->addColumn('shortname', 'string', ['length' => 255, 'null' => false])
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
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('modified_at', 'datetime', ['null' => true])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->addIndex('shortname', ['unique' => true, 'name' => 'IDX_action_shortname'])
            ->create();
    }
}
