<?php
namespace App\Controller;

use App\Controller\AppController;
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
            // 入力されたグループ情報：gname,gid,name,admin
            // おそらくこのコードがおかしい
            $group = $this->Groups->patchEntity($group, $this->request->getData());
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
        $gname = $this->Groups->find()->where(['gid' => $gid])->first();
        $this->set(compact('data','gname'));
    }
    
}