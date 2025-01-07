<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UserCode extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $tabela = $this->table('code');
        $tabela
            ->addColumn('user_id','integer',['signed' => true,'null' => false])
            ->addColumn('code','string',['default' => false])
            ->addColumn('created','datetime',['default' => 'CURRENT_TIMESTAMP','null' => false])
            ->addColumn('expires','datetime',['default' => 'CURRENT_TIMESTAMP','null' => false])
            ->create();

        $tabela->addForeignKey('user_id','user','id',['delete' => 'CASCADE'])
            ->save();
    }
}
