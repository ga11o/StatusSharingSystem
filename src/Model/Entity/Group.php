<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 *  team2/groups Entity
 * 
 * フィールド(カラム,属性)定義
 * 
 * @property string $name   ユーザ名(カンマで区切られた複数のユーザ名)
 * @property string $gname  グループ名
 * @property int    $admin  グループ作成者判定 0 or 1
 * @property string $gid    グループID(グループ招待コード)
 */

class Group extends Entity
{
    /**
     * team2/groupsのフィールドはnewEntity()を用いて値を一括代入
     * (フィールド)=>true   一括代入可能
     * (フィールド)=>false  一括代入不可能
     */
    protected $_accessible = [
        'name'=>true,
        'gname'=>true,
        'admin'=>true,
        'gid'=>true,
        'id'=> true,
    ];

    // このメソッドの戻り先・記載箇所が不明
    protected function _setUsers($name)
    {
        // ユーザ名をカンマ区切りから配列に変換
        return explode(',', $name);
    }
}