<?php

use Phinx\Seed\AbstractSeed;

class Action extends AbstractSeed
{
    public function run()
    {
        $data = [
            // Abstraindo em funcionalidades macro

            [
                'name'      => 'Visualizar página de exemplo',
                'shortname' => 'visualizar-pagina-de-exemplo',
                'type'      => 'OTHER'
            ],
            [
                'name'      => 'Visualizar página de política e privacidade',
                'shortname' => 'visualizar-pagina-de-policita-e-privacidade',
                'type'      => 'READ'
            ],
            [
                'name'      => 'Visualizar relatório de pagamentos',
                'shortname' => 'visualizar-relatorio-de-pagamentos',
                'type'      => 'OTHER'
            ],
            [
                'name'      => 'Visualizar relatório de usuários',
                'shortname' => 'visualizar-relatorio-de-usuarios',
                'type'      => 'READ'
            ],

            // Abstraindo em ações

            [
                'name'      => 'Cadastrar um usuário',
                'shortname' => 'cadastrar-um-usuario',
                'type'      => 'OTHER'
            ],
            [
                'name'      => 'Cadastrar um papel',
                'shortname' => 'cadastrar-um-papel',
                'type'      => 'CREATE'
            ],
            [
                'name'      => 'Remover um usuário',
                'shortname' => 'remover-um-usuario',
                'type'      => 'DELETE'
            ],
            [
                'name'      => 'Atualizar um usuário',
                'shortname' => 'atualizar-um-usuario',
                'type'      => 'UPDATE'
            ]
        ];

        $this->table('action')
            ->insert($data)
            ->save();
    }
}
