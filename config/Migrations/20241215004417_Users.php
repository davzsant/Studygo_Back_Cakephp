<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    public function change(): void
    {
        $this->table('User')
        ->addColumn('name','string',['limit' => 100,'null' => false])
        ->addColumn('username','string',['limit' => 100,'null' => false])
        ->addColumn('email','string',['limit' => 255])
        ->addColumn('created','datetime',['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('password','string',['limit' => 255,'null' => false])
        ->addColumn('description','text',['limit' => 500])
        ->addColumn('birth','datetime')
        ->create();
    }
}
