<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Follower Model
 *
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsTo $User
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsTo $User
 * @property \App\Model\Table\FollowerTable&\Cake\ORM\Association\HasMany $Follower
 *
 * @method \App\Model\Entity\Follower newEmptyEntity()
 * @method \App\Model\Entity\Follower newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Follower> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Follower get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Follower findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Follower patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Follower> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Follower|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Follower saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Follower>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Follower>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Follower>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Follower> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Follower>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Follower>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Follower>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Follower> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FollowerTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('follower');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Follower', [
            'foreignKey' => 'follower_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('follower_id')
            ->notEmptyString('follower_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'User'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['follower_id'], 'User'), ['errorField' => 'follower_id']);

        return $rules;
    }
}
