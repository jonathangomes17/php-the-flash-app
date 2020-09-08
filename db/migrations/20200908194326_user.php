<?php

use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    public function change()
    {
        $this->table('user', ['id' => false, 'primary_key' => 'id'])
            ->addColumn('id', 'integer', ['signed' => false])
            ->addColumn('status', 'enum', [
                'default' => 'NEW',
                'values'  => [
                    'NEW',
                    'ACTIVE',
                    'DELETED'
                ],
                'comment' => 'Status do usuário'
            ])
            ->addColumn('username', 'string', [
                'length'  => 255,
                'null'    => false,
                'comment' => 'Nome do usuário, podendo ser CPF, E-mail ou Nickname'
            ])
            ->addColumn('password', 'string', ['length' => 255, 'null' => false])
            ->addColumn('photo', 'string', [
                'length'  => 255,
                'null'    => false,
                'comment' => 'Foto do usuário'
            ])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('modified_at', 'datetime', ['null' => false])
            ->addColumn('deleted_at', 'datetime', ['null' => false])
            ->addColumn('last_access_at', 'datetime', ['null' => false])
            ->addIndex(['username', 'password'], ['name' => 'IDX_user_username_password'])
            ->create();
    }
}
