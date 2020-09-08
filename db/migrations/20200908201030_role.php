<?php

use Phinx\Migration\AbstractMigration;

class Role extends AbstractMigration
{
    public function change()
    {
        $this->table('role', ['primary_key' => 'id', 'signed' => false])
            ->addColumn('name', 'string', ['length' => 255, 'null' => false])
            ->addColumn('type', 'enum', [
                'default' => 'GROUP',
                'values'  => [
                    'GROUP',
                ],
                'comment' => 'Tipo da permissão'
            ])
            ->addIndex(['name'], ['unique' => true, 'name' => 'IDX_role_name'])
            ->create();
    }
}
