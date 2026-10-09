<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Tasks for Today') ?></title>

    <link rel="stylesheet" href="<?= base_url('css/style.css?v=2') ?>">
</head>
<body>

<header class="site-header">
    <nav class="navigation">
        <a class="brand" href="<?= site_url('/') ?>">
            <span class="brand-icon">✓</span>

            <span>
                <strong>Tasks for Today</strong>
                <small>Daily workspace</small>
            </span>
        </a>

        <div class="nav-links">
            <a href="<?= site_url('/') ?>">Today</a>
            <a href="<?= site_url('tasks') ?>">All Tasks</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
        </div>
    </nav>
</header>

<main class="page-container">
    <?= $this->renderSection('content') ?>
</main>

<footer class="site-footer">
    <p>Tasks for Today Management System</p>
</footer>

</body>
</html>