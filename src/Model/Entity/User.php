<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property \Cake\I18n\DateTime $created
 * @property string $password
 * @property string $description
 * @property \Cake\I18n\DateTime $birth
 * @property int|null $two_steps
 *
 * @property \App\Model\Entity\Follower[] $follower
 * @property \App\Model\Entity\Post[] $post
 * @property \App\Model\Entity\Follower[] $followed
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'username' => true,
        'email' => true,
        'created' => true,
        'password' => true,
        'description' => true,
        'birth' => true,
        'two_steps' => true,
        'follower' => true,
        'post' => true,
        'followed' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
