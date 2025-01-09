<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMidia extends AbstractMigration
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
        $table = $this->table('midia');
        $table
            ->addColumn('user_id','integer',['signed' => true,'null' => false])
            ->addColumn('status','string',['limit' => 255])
            ->addColumn('path','string',['limit' => 255])
            ->addColumn('type','string',['limit' => 255,'default' => 'image'])
            ->addColumn('validated','boolean',['null' => false,'default' => false])
            ->addColumn('duration','integer',['null' => true])
            ->addColumn('alt_text','text',['null' => true])
            ->addColumn('size','integer',['null' => true]);
        $table->create();
    }
}
