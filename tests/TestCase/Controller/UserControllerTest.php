<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UserController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UserController Test Case
 *
 * @uses \App\Controller\UserController
 */
class UserControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.User',
    ];
}
