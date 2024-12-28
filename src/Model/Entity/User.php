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
 * @property string|null $email
 * @property \Cake\I18n\DateTime|null $birth
 * @property string|null $gender
 * @property \Cake\I18n\DateTime|null $created
 * @property string|null $description
 * @property string|null $usercol
 * @property string $password
 *
 * @property \App\Model\Entity\Post[] $post
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
        'birth' => true,
        'gender' => true,
        'created' => true,
        'description' => true,
        'usercol' => true,
        'password' => true,
        'post' => true,
        'follower' => true
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
