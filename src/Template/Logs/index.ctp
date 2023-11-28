<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('ホーム', ['controller' => 'Accounts', 'action' => 'index'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('あなたの情報', ['controller' => 'Accounts', 'action' => 'view'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('グループ作成', ['controller' => 'Groups', 'action' => 'add'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('ログアウト', ['controller' => 'Accounts', 'action' => 'logout'], ['class' => 'btn']) ?></li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
    <h3>状態ログ</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>感情</th>
            <th>体調</th>
            <th>更新時間</th>
        </tr>
            <?php foreach ($logs as $row): ?>
                <tr>
                    <td><?= h($row->id) ?></td>
                    <td>
                        <?php if($row->mental === 0): ?>
                            <img src="/img/sobad.png" width=40px height=40px> とても悪い
                        <?php elseif($row->mental === 1): ?>
                            <img src="/img/bad.png" width=40px height=40px> 悪い
                        <?php elseif($row->mental === 2): ?>
                            <img src="/img/normal.png" width=40px height=40px> 普通
                        <?php elseif($row->mental === 3): ?>
                            <img src="/img/good.png" width=40px height=40px> 良い
                        <?php elseif($row->mental === 4): ?>
                            <img src="/img/sogood.png" width=40px height=40px> とても良い
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($row->physical === 0): ?>
                            <img src="/img/sobad.png" width=40px height=40px> とても悪い
                        <?php elseif($row->physical === 1): ?>
                            <img src="/img/bad.png" width=40px height=40px> 悪い
                        <?php elseif($row->physical === 2): ?>
                            <img src="/img/normal.png" width=40px height=40px> 普通
                        <?php elseif($row->physical === 3): ?>
                            <img src="/img/good.png" width=40px height=40px> 良い
                        <?php elseif($row->physical === 4): ?>
                            <img src="/img/sogood.png" width=40px height=40px> とても良い
                        <?php endif; ?>
                    </td>
                    <td><?= h($row->time->i18nFormat('yyyy年MM月dd日 HH:mm:ss')) ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    
    <?= $this->Html->link('戻る', ['controller' => 'Accounts', 'action' => 'index'], ['class' => 'button']) ?>
</div>
