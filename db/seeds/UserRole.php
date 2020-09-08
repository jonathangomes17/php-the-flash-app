<?php

use Phinx\Seed\AbstractSeed;

class UserRole extends AbstractSeed
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 36; $i++) {
            array_push($data, [
                'user_id' => $i,
                'role_id' => $i % 2 === 0 ? 1 : 2
            ]);
        }

        $this->table('user_role')
            ->insert($data)
            ->save();
    }
}
