<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Log extends Entity
{
    protected $_accessible = [
        'id' => true,
        'mental' => true,
        'physical' => true,
        'time' => true,
    ];
}
