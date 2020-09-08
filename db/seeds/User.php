<?php

use Phinx\Seed\AbstractSeed;

class User extends AbstractSeed
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i < 10; $i++) {
            array_push($data, $this->getUser('NEW'));
            array_push($data, $this->getUser('DELETED'));
            array_push($data, $this->getUser('ACTIVE'));
            array_push($data, $this->getUser('ACTIVE', true));
        }

        $this->table('user')
            ->insert($data)
            ->save();
    }

    /**
     * @param      $status
     * @param bool $photo
     *
     * @return array
     * @throws Exception
     */
    private function getUser($status, $photo = false)
    {
        $random = random_int(0, 99999999999);

        return [
            'status'   => $status,
            'photo'    => $photo ?? 'https://i.imgur.com/qJmbQPo.jpeg',
            'username' => "user$random@localhost",
            'password' => password_hash('1234', PASSWORD_BCRYPT),
        ];
    }
}
