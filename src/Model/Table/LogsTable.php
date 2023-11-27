<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LogsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('logs');

        $this->setPrimaryKey(['id','time']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('id')
            ->maxLength('id', 13)
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->integer('mental')
            ->requirePresence('mental', 'create')
            ->notEmptyString('mental');

        $validator
            ->integer('physical')
            ->requirePresence('physical', 'create')
            ->notEmptyString('physical');

        $validator
            ->scalar('time')
            ->maxLength('time', 40)
            ->requirePresence('time', 'create')
            ->notEmptyString('time');

        return $validator;
    }
}
