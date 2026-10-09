<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<section class="task-editor">
    <a href="<?= site_url('tasks') ?>" class="back-link">
        ← Back to all tasks
    </a>

    <div class="task-editor-card">
        <div class="editor-header">
            <div class="editor-icon">+</div>

            <div>
                <p class="eyebrow">Create task</p>
                <h1>Add a New Task</h1>
                <p>Organize your day by adding the task details below.</p>
            </div>
        </div>

        <?php $errors = session()->getFlashdata('errors'); ?>

        <?php if (! empty($errors)): ?>
            <div class="alert alert-error">
                <strong>Please check the following:</strong>

                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form
            action="<?= site_url('tasks') ?>"
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
                    placeholder="Example: Finish project documentation"
                    value="<?= esc(old('title')) ?>"
                    required
                    autofocus
                >

                <small>Use a short and clear description of your task.</small>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="status">Task status</label>

                    <select id="status" name="status" required>
                        <option
                            value="pending"
                            <?= old('status', 'pending') === 'pending' ? 'selected' : '' ?>
                        >
                            Pending
                        </option>

                        <option
                            value="in_progress"
                            <?= old('status') === 'in_progress' ? 'selected' : '' ?>
                        >
                            In Progress
                        </option>

                        <option
                            value="completed"
                            <?= old('status') === 'completed' ? 'selected' : '' ?>
                        >
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
                        value="<?= esc(old('task_date', date('Y-m-d'))) ?>"
                        required
                    >
                </div>
            </div>

            <div class="form-actions">
                <a href="<?= site_url('tasks') ?>" class="button button-secondary">
                    Cancel
                </a>

                <button type="submit" class="button button-primary">
                    Add Task
                </button>
            </div>
        </form>
    </div>
</section>

<?= $this->endSection() ?>