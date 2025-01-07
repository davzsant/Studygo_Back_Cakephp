<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Code Model
 *
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsTo $User
 *
 * @method \App\Model\Entity\Code newEmptyEntity()
 * @method \App\Model\Entity\Code newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Code> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Code get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Code findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Code patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Code> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Code|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Code saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Code>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Code>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Code>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Code> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Code>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Code>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Code>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Code> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CodeTable extends Table
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

        $this->setTable('code');
        $this->setDisplayField('code');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->scalar('code')
            ->maxLength('code', 255)
            ->notEmptyString('code');

        $validator
            ->dateTime('expires')
            ->notEmptyDateTime('expires');

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

        return $rules;
    }
}
