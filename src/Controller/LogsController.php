<?php
namespace App\Controller;

use App\Controller\AppController;

class LogsController extends AppController
{
    public function index($id = null,$gid = null)
    {
        $logs = $this->paginate($this->Logs->find('all', ['order' => ['time' => 'DESC']])->where(['id' => $id, 'gid' => $gid]));

        $this->set(compact('logs'));
    }

    public function view($id = null)
    {
        $log = $this->Logs->get($id, [
            'contain' => [],
        ]);

        $this->set('log', $log);
    }
}
