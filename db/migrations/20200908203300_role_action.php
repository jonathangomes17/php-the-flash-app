<?php

use Phinx\Migration\AbstractMigration;

class RoleAction extends AbstractMigration
{
    public function change()
    {
        $this->table('role_action', ['id' => false, 'primary_key' => ['role_id', 'action_id']])
            ->addColumn('role_id', 'integer', ['signed' => false])
            ->addColumn('action_id', 'integer', ['signed' => false])
            ->addColumn('is_create', 'boolean', ['default' => 1])
            ->addColumn('is_read', 'boolean', ['default' => 1])
            ->addColumn('is_update', 'boolean', ['default' => 1])
            ->addColumn('is_delete', 'boolean', ['default' => 1])
            ->create();
    }
}
