<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Follow extends AbstractMigration
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
        $tabela = $this->table('follower');
        $tabela
            ->addColumn('user_id','integer',['null' => false,'signed' => true])
            ->addColumn('follower_id','integer',['null' => false,'signed' => true])
            ->create();

        $tabela
            ->addForeignKey('user_id','user','id',['delete' => 'CASCADE'])
            ->addForeignKey('follower_id','user','id',['delete' => 'CASCADE'])
            ->save();
    }
}
