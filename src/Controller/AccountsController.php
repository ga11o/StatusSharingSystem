<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 *
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{

    /**
     *  beforeFilterアクション
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);//これを書かないとlogin画面しか表示できない。
    }

    /**
     *  login アクション
     *  
     */

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
            $this->Flash->error(__('ユーザーまたはパスワードに誤りがあります。'));
            }
        }
    }

    /**
     * logout アクション
     */

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * isAuthorized アクション
     */

    public function isAuthorized($user) 
    {
        return true;
    }

    /**
     * Index アクション
     *
     * @return \Cake\Http\Response|null
     */

    public function index()
    {
        // Groupsテーブルのロード
        $this->loadModel('Groups');
        $this->loadModel('Accounts');

        // ビューにユーザー情報を渡す

        $user = $this->Auth->user();

        // ビューにユーザの所属するグループ一覧を渡す
        // ログインユーザ情報のnameとGroupテーブルのnameが一致するレコード
        $data = $this->Groups->find()->where(['name' => $user['name']])->all();

        $this->set('id', $user['id']);
        $this->set('name', $user['name']);
        $this->set('phone', $user['phone']);
        $this->set('email', $user['email']);

        $this->set('data', $data);

        // グループ参加機能
        if ($this->request->is('post')) {
            $gid = $this->request->getData('グループID');

            // 渡されたgidとGroupテーブルのgidが一致するレコード
            $data = $this->Groups->find()->where(['gid' => $gid])->first();

            if ($data == null) {
                $this->Flash->error(__('グループが見つかりませんでした。'));
            } else {
                $NewUser = $this->Groups->newEntity();
                $NewUser->name = $user['name'];
                $NewUser->id = $user['id'];
                $NewUser->gid = $gid;
                $NewUser->gname = $data->gname;
                $NewUser->mental = null;
                $NewUser->physical = null;
                $NewUser->admin = 0;

                if ($this->Groups->save($NewUser)) {
                    $this->Flash->success(__('新しいグループに参加しました。'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('グループへの参加に失敗しました。'));
                }
            }
        }
    }

    /**
     * View アクション
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view()
    {
        $account = $this->Auth->user();

        $this->set('account', $account);
    }

    /**
     * Add アクション
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('アカウントが登録されました'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('アカウント登録に失敗しました。再入力してください。'));
        }
        $this->set(compact('account'));
    }

    /**
     * Edit アクション
     *
     * アカウント編集
     */

    public function edit()
    {
        $account = $this->Accounts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $this->set(compact('account'));
    }

    /**
     * Delete アクション
     *
     * アカウント削除
     */

    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);

        $deleteAccount = $this->Auth->user();

        if($deleteAccount){
    
            // Accountsテーブルからname == removeUserName , gname == removeUserGName , gid == removeUserGidのレコード削除

            $this -> Accounts -> deleteAll([
                'name' => $deleteAccount['name'],
                'id' => $deleteAccount['id']
            ]);

            $this->Flash->success(__('ユーザが削除されました。'));
            return $this->redirect(['action' => 'add']);
        }
        else{
            $this->Flash->error(__('ユーザが見つかりませんでした。もう一度お試しください。'));
            return $this->redirect(['action' => 'delete']);
        }

        return $this->redirect(['action' => 'logout']);
    }
}