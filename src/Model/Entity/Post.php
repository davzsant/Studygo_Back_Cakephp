<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $body
 * @property int $user_id
 * @property int|null $question_id
 * @property \Cake\I18n\DateTime|null $created
 * @property string|null $resume
 *
 * @property \App\Model\Entity\User $user
 */
class Post extends Entity
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
        'title' => true,
        'body' => true,
        'user_id' => true,
        'question_id' => true,
        'created' => true,
        'resume' => true,
        'user' => true,
    ];
}
