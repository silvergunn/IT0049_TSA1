<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="form-page">
    <div class="page-heading">
        <div>
            <p class="eyebrow">Update</p>
            <h1>Edit Task</h1>
            <p class="page-description">
                Change the task information and save your updates.
            </p>
        </div>
    </div>

    <?php $errors = session()->getFlashdata('errors'); ?>

    <?php if (! empty($errors)): ?>
        <div class="alert alert-error">
            <strong>Please correct the following:</strong>

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form
        action="<?= site_url('tasks/update/' . $task['id']) ?>"
        method="post"
        class="task-form"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="title">Task title</label>

            <input
                type="text"
                id="title"
                name="title"
                maxlength="150"
                value="<?= esc(old('title', $task['title'])) ?>"
                required
            >
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="status">Status</label>

                <?php $selectedStatus = old('status', $task['status']); ?>

                <select id="status" name="status" required>
                    <option value="pending" <?= $selectedStatus === 'pending' ? 'selected' : '' ?>>
                        Pending
                    </option>

                    <option value="in_progress" <?= $selectedStatus === 'in_progress' ? 'selected' : '' ?>>
                        In Progress
                    </option>

                    <option value="completed" <?= $selectedStatus === 'completed' ? 'selected' : '' ?>>
                        Completed
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="task_date">Task date</label>

                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="<?= esc(old('task_date', $task['task_date'])) ?>"
                    required
                >
            </div>
        </div>

        <div class="form-actions">
            <a href="<?= site_url('tasks') ?>" class="button button-secondary">
                Cancel
            </a>

            <button type="submit" class="button button-primary">
                Save Changes
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>