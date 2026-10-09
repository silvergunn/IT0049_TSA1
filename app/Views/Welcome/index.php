<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Tasks for Today</h1>
<p><?= date('F j, Y') ?></p>

<?php if (! empty($tasks)): ?>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td>
                        <span class="status status-<?= esc($task['status']) ?>">
                          <?= esc(ucwords(str_replace('_', ' ', $task['status']))) ?>
                        </span>
                    </td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tasks scheduled for today.</p>
<?php endif; ?>

<?= $this->endSection() ?>