<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UpdateUser extends AbstractMigration
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
        $user = $this->table('user');
        $user->changeColumn('two_steps','tinyinteger',['default' => 0]);
        $user->update();
    }
}
