<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FollowerFixture
 */
class FollowerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'follower';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'follower_id' => 1,
            ],
        ];
        parent::init();
    }
}
