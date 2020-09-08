<?php

use Phinx\Migration\AbstractMigration;

class RoleActions extends AbstractMigration
{
    public function change()
    {
        $this->table('role_actions', ['id' => false, 'primary_key' => ['role_id', 'action_id']])
            ->addColumn('role_id', 'integer', ['signed' => false])
            ->addColumn('action_id', 'integer', ['signed' => false])
            ->addColumn('is_create', 'boolean', ['default' => 0])
            ->addColumn('is_read', 'boolean', ['default' => 0])
            ->addColumn('is_update', 'boolean', ['default' => 0])
            ->addColumn('is_delete', 'boolean', ['default' => 0])
            ->addForeignKey('role_id', 'action', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('action_id', 'role', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
