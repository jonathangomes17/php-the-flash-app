<?php

use Phinx\Migration\AbstractMigration;

class UserRole extends AbstractMigration
{
    public function change()
    {
        $this->table('user_role', ['id' => false, 'primary_key' => ['user_id', 'role_id']])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addColumn('role_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'role', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
            ->addForeignKey('role_id', 'user', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
            ->create();
    }
}
