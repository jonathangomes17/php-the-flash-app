<?php

use Phinx\Migration\AbstractMigration;

class UserRole extends AbstractMigration
{
    public function change()
    {
        $this->table('user_role', ['id' => false, 'primary_key' => ['user_id', 'role_id']])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addColumn('role_id', 'integer', ['signed' => false])
            ->create();
    }
}
