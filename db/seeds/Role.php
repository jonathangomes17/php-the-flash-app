<?php

use Phinx\Seed\AbstractSeed;

class Role extends AbstractSeed
{
    public function run()
    {
        $data = [
            ['name' => 'Administrador', 'shortname' => 'admin'],
            ['name' => 'Usuário comum', 'shortname' => 'user'],
            ['name' => 'Usuário convidado', 'shortname' => 'guest']
        ];

        $this->table('role')
            ->insert($data)
            ->save();
    }
}
