<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Posts extends AbstractMigration
{
    public function change(): void
    {
        $tabela = $this->table('post');
        $tabela
            ->addColumn('title','string',['limit' => 100,'null' => false])
            ->addColumn('body','text')
            ->addColumn('user_id','integer',['null'=> false,'signed' => true])
            ->addColumn('question_id','integer',['signed' => true])
            ->addColumn('created','datetime',['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('resume','string',['limit' => 300])
            ->create();
        $tabela->addForeignKey('user_id','user','id',['delete' => 'CASCADE'])
            ->save();

    }
}
