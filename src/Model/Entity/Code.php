<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Code Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $expires
 *
 * @property \App\Model\Entity\User $user
 */
class Code extends Entity
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
        'user_id' => true,
        'code' => true,
        'created' => true,
        'expires' => true,
        'user' => true,
    ];
}
