<?php

use Phinx\Seed\AbstractSeed;

class RoleAction extends AbstractSeed
{
    public function run()
    {
        $data = [
            // Administrador

            ['role_id' => 1, 'action_id' => 1],
            ['role_id' => 1, 'action_id' => 2],
            ['role_id' => 1, 'action_id' => 3],
            ['role_id' => 1, 'action_id' => 4],
            ['role_id' => 1, 'action_id' => 5],
            ['role_id' => 1, 'action_id' => 6],
            ['role_id' => 1, 'action_id' => 7],
            ['role_id' => 1, 'action_id' => 8],

            // Usuário comum

            [
                'role_id'   => 2,
                'action_id' => 1,
                'is_create' => 0,
                'is_read'   => 1,
                'is_update' => 0,
                'is_delete' => 0
            ],
            [
                'role_id'   => 2,
                'action_id' => 2,
                'is_create' => 0,
                'is_read'   => 1,
                'is_update' => 0,
                'is_delete' => 0
            ]
        ];

        $this->table('role_action')
            ->insert($data)
            ->save();
    }
}
