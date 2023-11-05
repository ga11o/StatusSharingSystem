<?php
namespace App\Controller;

use App\Controller\AppController;

class LogsController extends AppController
{
    public function index()
    {
        $logs = $this->paginate($this->Logs);

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
