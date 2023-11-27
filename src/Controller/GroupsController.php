<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Datasource\ConnectionInterface;
use Cake\I18n\Time;

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

            // 入力されたグループ情報を変数(空レコード)$groups に適用
            // 入力されたグループ情報：gname,gid

            $group = $this->Groups->patchEntity($group, $this->request->getData());

            // グループ作成者：admin == 1

            $group->admin = 1;

            // グループ作成者氏名

            $user = $this->Auth->user();  // ログインデータ取得
            $group->name = $user['name']; // ユーザネーム
            $group->id = $user['id'];     // ユーザID
            
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

        // ログをたくさん作成してから動作確認する

        $User = $this->Auth->user();
        $AdUser = $this->Groups->find()->where(['gid' => $gid, 'admin' => 1])->first();

        // 管理者である場合
        if ($AdUser && $User['id'] == $AdUser->id) {
            $this->loadModel('Logs');
            $member = $this->Logs->newEntity();
            $member->id = 'id';
            // メンバーの更新状況を確認
            // メンバー全員の情報を取得
            $Members = $this->Groups->find()->where(['gid' => $gid, 'admin' => 0])->all();
            if ($Members !== null) {
                foreach ($Members as $Members) {
                    // メンバーのIDから直近2つのログを取得
                    $result = $this->Logs->find()->order(['time' => 'DESC'])->where(['id' => $Members->id])->limit(2)->toArray();
                    if (count($result) == 2) {
                        $physical1 = $result[0]->physical;
                        $physical2 = $result[1]->physical;
                        $mental1 = $result[0]->mental;
                        $mental2 = $result[1]->mental;
                        // 体調または心情が2段階以上悪化していたらFlashメッセージ
                        if ((($physical1 - $physical2) <= -1) || (($mental1 - $mental2) <= -1)) {
                            $this->Flash->error(__('{0}さんの状態が悪化しているようです', $Members->name));
                        }
                    }
                }
            }
        }
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
            $newUser->id = $addUserId;
    
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

    /**
     * statusinput メソッド
     * 体調・心情をgroupsテーブルに追加
     */
    
     public function statusinput($name,$gid)
    {
        $data = $this->Groups->find()->where(['name' => $name,'gid' => $gid])->first();//nameカラムが$nameの行を$dataに入れる。
        if (!$data) {
            throw new NotFoundException(__('データが見つかりません。'));
        }
        $logTable = \Cake\ORM\TableRegistry::get('Logs');
        $log = $logTable->newEntity();
        if ($this->request->is('post')) {
            $input = $this->request->getData();//postで受け取った内容
            if(count($input)==2){
                $data -> physical = $input['physical'];//$dataのphysicalを入力された値に更新
                $data -> mental = $input['mental'];//$dataのmentalを入力された値に更新
                if ($this->Groups->save($data,false,array('physical','mental'))) {//physicalカラムとmentalカラムを更新
                    $this->Flash->success(__('状態登録完了'));

                    //return $this->redirect(['action' => 'index']);
                }

                $id = $this->Auth->user('id');
                $time = Time::now()->i18nFormat('yyyy/MM/dd HH:mm:ss');
                debug($time);
                $loginfo = [
                    'id' => $id,
                    'physical' => $input['physical'],
                    'mental' => $input['mental'],
                    'time' => $time,
                    'gid' => $gid
                ];
                $log = $logTable->patchEntity($log, $loginfo);
                //debug($log);
                if ($logTable->save($log)) {
                    $this->Flash->success(__('The log has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }else {
                    debug("Data save to Logs table failed");
                    debug($log->getErrors());
                }

                $this->Flash->error(__('状態登録に失敗しました。再入力してください。'));
            }else{
                $this->Flash->error(__('すべての項目を入力してください。'));
            }
        }
        $this->set(compact('data'));
    }

}