<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Datasource\ConnectionInterface;


class groupsController extends AppController{

    /**
     * index メソッド
     * アカウント情報の一覧表示
     */
    public function index()
    {
        // team2/accountsのデータを変数$groupsに代入
        $groups = $this->paginate($this->Groups);

        // 取得したアカウント情報をビュー(Template/Groups/index.ctp)に渡す
        // $groups 変数をビューにセットして、ビュー内でアカウント情報を利用できる
        $this->set(compact('groups'));
        
    }

    /**
     * add メソッド
     * team2/groups にレコード追加
     */
    public function add()
    {
        // team2/groups の空レコードを作成し変数 $group に代入
        $group = $this->Groups->newEntity();

        // Template/Groups/add.ctpのグループ情報入力フォームの内容がサーバに post された場合
        if ($this->request->is('post')) {
            // 入力されたグループ情報を変数 空レコード $groups に適用
            // 入力されたグループ情報：gname,gid,name
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            $group->admin = 1;
            // team2/groups に保存成功
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('グループが保存されました。'));
                return $this->redirect(['action' => 'index']);
            }
            // team2/groups に保存失敗
            $this->Flash->error(__('グループを保存できませんでした。もう一度お試しください。'));
        }
        $this->set(compact('group')); // ビュー(Template/Groups/add.ctp)にアカウント情報を渡す
    }

    /**
     * view メソッド
     * グループ作成後、そのグループを表示
     */
    public function view($gid)
    {
        $data = $this->Groups->find()->where(['gid' => $gid])->all();
        $ginfo = $this->Groups->find()->where(['gid' => $gid])->first();
        $this->set(compact('data','ginfo'));
    }

    /**
     * addUserToGroup アクション
     * グループにユーザ追加処理
     */
    public function addUserToGroup(){
        // Groups, Accounts テーブルのモデルをロード
        $this->loadModel('Groups');
        $this->loadModel('Accounts');
    
        if ($this->request->is('post')) { // POST リクエストの場合の処理
            // フォームからユーザIDを受け取る
            $addUserId = $this->request->getData('id');
    
            // グループ情報をクエリパラメーターから取得
            $gname = $this->request->getQuery('gname');
            $gid = $this->request->getQuery('gid');
    
            // 新しいレコードを作成
            $newUser = $this->Groups->newEntity();
            $newUser->gname = $gname;
            $newUser->gid = $gid;
            $newUser->admin = 0;
    
            // ユーザの名前を取得
            $user = $this->Accounts->find()->select(['name'])->where(['id' => $addUserId])->first();
    
            if ($user) {
                $newUser->name = $user->name; // クエリの結果から名前を設定
    
                if ($this->Groups->save($newUser)) {
                    $this->Flash->success(__('ユーザが追加されました。'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('ユーザを追加できませんでした。もう一度お試しください。'));
                }
            } else {
                $this->Flash->error(__('入力されたIDと一致するユーザが見つかりませんでした。もう一度お試しください。'));
            }
        }
    }

    /**
     * removeUserFromGroupアクション
     * グループ作成者がグループメンバーを除外
     */
    public function removeUserFromGroup(){
        // Groups, Accounts テーブルのモデルをロード
        $this->loadModel('Groups');
        $this->loadModel('Accounts');

        // グループから除外するユーザIDが入力された場合( post )
        if ($this->request->is('post')) {
            $removeUserId = $this->request->getData('id'); // idを受け取る

            // グループ情報をクエリパラメーターから取得
            $removeUserGName = $this->request->getQuery('gname');
            $removeUserGid = $this->request->getQuery('gid');

            // ユーザの名前を取得
            $removeUser = $this->Accounts->find()->where(['id' => $removeUserId])->first();

            if($removeUser){
                // Groupsテーブルからname == removeUserName , gname == removeUserGName , gid == removeUserGidのレコード削除
                $this -> Groups -> deleteAll([
                    'name' => $removeUser -> name,
                    'gname' => $removeUserGName,
                    'gid' => $removeUserGid
                ]);

                $this->Flash->success(__('ユーザが削除されました。'));
                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__('ユーザが見つかりませんでした。もう一度お試しください。'));
                return $this->redirect(['action' => 'remove_user_from_group']);
            }
        }
    }
}