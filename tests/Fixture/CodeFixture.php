<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CodeFixture
 */
class CodeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'code';
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
                'code' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-02 18:08:07',
                'expires' => '2025-01-02 18:08:07',
            ],
        ];
        parent::init();
    }
}
