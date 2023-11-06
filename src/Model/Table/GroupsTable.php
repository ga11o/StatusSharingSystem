<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class GroupsTable extends Table
{
    /**
     * Initialize メソッド
     * モデル初期化
     *
     * 引数$configの説明
     * @param array $config テーブルの設定情報
     */
    public function initialize(array $config)
    {
        // 親クラス(Table)のinitializeメソッドを呼び出し$configで初期化
        parent::initialize($config);

        // 初期化したモデルをteam2/groupsテーブルに対応・設定させる
        $this->setTable('groups');

        // team2/groupsテーブルのレコードを表示する際に用いるフィールドを'gname'に設定
        $this->setDisplayField('gname');
                
        // プライマリキーを'gid' と 'gname' と'name' の組み合わせに設定(一意性)
        $this->setPrimaryKey(['gid','gname','name']);
    }

    /**
     * validationDefaultメソッド
     * バリデーション設定
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 33);

        $validator
            ->scalar('gname')
            ->maxLength('gname',33);
        
        $validator
            ->integer('admin')
            ->range('admin', [0, 1]);
        
        $validator
            ->scalar('gid')
            ->maxLength('gid',10);
        
        return $validator;
    }

    /**
     * buildRules メソッド
     * team2/groupsのレコードが一意であることを確認するためのルール設定
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['gid','name']));
        return $rules;
    }
}
