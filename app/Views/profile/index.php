<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>User Profile</h1>

<?php if ($user): ?>
    <dl>
        <dt>Username</dt>
        <dd><?= esc($user['username']) ?></dd>

        <dt>Full Name</dt>
        <dd><?= esc($user['full_name']) ?></dd>

        <dt>Email Address</dt>
        <dd><?= esc($user['email']) ?></dd>

        <dt>Account Created</dt>
        <dd><?= esc($user['created_at']) ?></dd>
    </dl>
<?php else: ?>
    <p>No user profile was found.</p>
<?php endif; ?>

<?= $this->endSection() ?>