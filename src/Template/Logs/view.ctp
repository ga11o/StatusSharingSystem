<div class="logs view large-9 medium-8 columns content">
    <h3><?= h($log->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($log->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($log->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physical') ?></th>
            <td><?= $this->Number->format($log->physical) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mental') ?></th>
            <td><?= $this->Number->format($log->mental) ?></td>
        </tr>
    </table>
</div>
