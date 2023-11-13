<?php
namespace App\Event;
use Cake\Event\EventListenerInterface;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class UpdateDataListener implements EventListenerInterface {
    // 他のファイルで'Event.afterSave'が指定されると、下のafterSaveメソッドが呼び出される
    public function implementedEvents() {
        return ['Event.afterSave' => 'afterSave'];
    }

    // Logsテーブルにログを挿入
    public function afterSave($event, $entity, $options) {
        $LogsTable = TableRegistry::getTableLocator()->get('logs');
        $mental = $event->getData('mental');
        $physical = $event->getData('physical');
        $time = Time::now()->format('Ymdhi');
        $newEntity = $LogsTable->newEntity([
            'id' => '123456',       // idの設定は保留
            'mental' => $mental, 
            'physical'=> $physical, 
            'time' => $time
        ]);
        $LogsTable->save($newEntity);
    }
}
