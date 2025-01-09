<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UpdatePosts extends AbstractMigration
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
        $tabela = $this->table('post');
        $tabela->addColumn('type','string',['limit' => 100,'default' => 'post']);
        $tabela->addColumn('is_public','boolean',['default' => true]);
        $tabela->update();
    }
}
