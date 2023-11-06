<div class="logs index large-12 medium-8 columns content">
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
                    <td><?= h($row->mental) ?></td>
                    <td><?= h($row->physical) ?></td>
                    <td><?= h($row->time) ?></td>
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
    
</div>
