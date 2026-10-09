<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <div>
        <p class="eyebrow">Task management</p>
        <h1>All Tasks</h1>
        <p class="page-description">
            View and manage all your scheduled tasks.
        </p>
    </div>

    <a href="<?= site_url('tasks/create') ?>" class="button button-primary">
        + Add Task
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<div class="table-container">
    <?php if (! empty($tasks)): ?>
        <table class="task-table">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td data-label="Task">
                            <strong><?= esc($task['title']) ?></strong>
                        </td>

                        <td data-label="Status">
                            <span class="status status-<?= esc($task['status']) ?>">
                                <?= esc(ucwords(str_replace('_', ' ', $task['status']))) ?>
                            </span>
                        </td>

                        <td data-label="Date">
                            <?= esc(date('F j, Y', strtotime($task['task_date']))) ?>
                        </td>

                        <td data-label="Actions">
                            <div class="task-actions">
                                <a
                                    href="<?= site_url('tasks/edit/' . $task['id']) ?>"
                                    class="button button-small button-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?= site_url('tasks/delete/' . $task['id']) ?>"
                                    method="post"
                                    class="delete-form"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');"
                                >
                                    <?= csrf_field() ?>

                                    <button
                                        type="submit"
                                        class="button button-small button-delete"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty-state">
            <h2>No tasks found</h2>
            <p>Add your first task to begin organizing your day.</p>

            <a href="<?= site_url('tasks/create') ?>" class="button button-primary">
                + Add Task
            </a>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>