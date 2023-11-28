<!-- view.ctp -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('ホーム', ['controller' => 'Accounts', 'action' => 'index'], ['class' => 'btn']) ?></li>
        <li>
        <?= $this->Html->link('ユーザを追加する', 
        ['controller' => 'Groups',
         'action' => 'addUserToGroup',
         '?' => [
            'gname' => $ginfo->gname,
            'gid'   => $ginfo->gid
        ]],
           ['class' => 'btn']) ?>
        </li>
        <li><?= $this->Html->link('ユーザを削除する', 
        ['controller' => 'Groups',
        'action' => 'removeUserFromGroup',
        '?' => [
            'gname' => $ginfo->gname,
            'gid'   => $ginfo->gid
        ]],
        ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('ログアウト', ['controller' => 'Accounts', 'action' => 'logout'], ['class' => 'btn']) ?></li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
<?php if (isset($data)): ?>

<h1><?= h($ginfo->gname) ?>画面</h1>

<table>
    <tr>
        <th>ユーザID</th>
        <th>ユーザ名</th>
        <th>権限</th>
        <th>感情</th>
        <th>体調</th>
        <th>操作</th>
    <?php foreach ($data as $item): ?>
    <tr>
        <td><?= h($item->id) ?></td>
        <td><?= h($item->name) ?></td>
        <td><?= ($item->admin == 1) ? "管理者" : "一般" ?></td>
        <td>
            <?php if($item->mental === 0): ?>
                <img src="/img/sobad.png" width=40px height=40px> とても悪い
            <?php elseif($item->mental === 1): ?>
                <img src="/img/bad.png" width=40px height=40px> 悪い
            <?php elseif($item->mental === 2): ?>
                <img src="/img/normal.png" width=40px height=40px> 普通
            <?php elseif($item->mental === 3): ?>
                <img src="/img/good.png" width=40px height=40px> 良い
            <?php elseif($item->mental === 4): ?>
                <img src="/img/sogood.png" width=40px height=40px> とても良い
            <?php endif; ?>
        </td>
        <td>
            <?php if($item->physical === 0): ?>
                <img src="/img/sobad.png" width=40px height=40px> とても悪い
            <?php elseif($item->physical === 1): ?>
                <img src="/img/bad.png" width=40px height=40px> 悪い
            <?php elseif($item->physical === 2): ?>
                <img src="/img/normal.png" width=40px height=40px> 普通
            <?php elseif($item->physical === 3): ?>
                <img src="/img/good.png" width=40px height=40px> 良い
            <?php elseif($item->physical === 4): ?>
                <img src="/img/sogood.png" width=40px height=40px> とても良い
            <?php endif; ?>
        </td>
        <td>
                <?= $this->Html->link(__('状態確認'), ['controller' => 'Logs', 'action' => 'index',$item->id,$item->gid],['class' => 'btn']) ?>
                <?= $this->Html->link(__('退会'),['action' => 'remove_user_from_group',$item->name],['class' => 'btn']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php else: ?>
<p>データが見つかりませんでした。</p>
<?php endif; ?>

<?= $this->Html->link('戻る', ['controller' => 'Accounts', 'action' => 'index'], ['class' => 'button']) ?>
</div>