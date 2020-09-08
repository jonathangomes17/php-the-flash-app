<?php

use Phinx\Migration\AbstractMigration;

class Constraints extends AbstractMigration
{
    public function change()
    {
        // $this->table('user')
        //     ->addForeignKey('id', 'user_role', 'user_id', [
        //         'delete'     => 'CASCADE',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_user_user_role_user_id'
        //     ])
        //     ->save();
        //
        // $this->table('role')
        //     ->addForeignKey('id', 'role_action', 'role_id', [
        //         'delete'     => 'CASCADE',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_role_role_action_role_id'
        //     ])
        //     // ->addForeignKey('id', 'user_role', 'role_id', [
        //     //     'delete'     => 'CASCADE',
        //     //     'update'     => 'NO_ACTION',
        //     //     'constraint' => 'FK_role_user_role_role_id'
        //     // ])
        //     ->save();
        //
        // $this->table('user_role')
        //     ->addForeignKey('user_id', 'user', 'id', [
        //         'delete'     => 'NO_ACTION',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_user_role_user_id'
        //     ])
        //     ->addForeignKey('role_id', 'role', 'id', [
        //         'delete'     => 'NO_ACTION',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_user_role_role_id'
        //     ])
        //     ->save();

        // $this->table('action')
        //     ->addForeignKey('id', 'role_action', 'action_id', [
        //         'delete'     => 'CASCADE',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_act_role_act_act_id'
        //     ])
        //     ->save();

        // $this->table('role_action')
        //     ->addForeignKey('role_id', 'role', 'id', [
        //         'delete'     => 'NO_ACTION',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_role_action_role_id'
        //     ])
        //     ->addForeignKey('action_id', 'action', 'id', [
        //         'delete'     => 'NO_ACTION',
        //         'update'     => 'NO_ACTION',
        //         'constraint' => 'FK_role_action_action_id'
        //     ])
        //     ->save();
    }
}
