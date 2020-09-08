<?php

use Phinx\Migration\AbstractMigration;

class Role extends AbstractMigration
{
    public function change()
    {
        $this->table('role', ['primary_key' => 'id', 'signed' => false, 'identity' => true])
            ->addColumn('name', 'string', ['length' => 255, 'null' => false])
            ->addColumn('shortname', 'string', ['length' => 255, 'null' => false])
            ->addColumn('type', 'enum', [
                'default' => 'GROUP',
                'values'  => [
                    'GROUP',
                ],
                'comment' => 'Tipo da permissão'
            ])
            ->addIndex('shortname', ['unique' => true, 'name' => 'IDX_role_shortname'])
            ->create();
    }
}
